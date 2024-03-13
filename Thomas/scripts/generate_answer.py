import mysql.connector
import os
import openai
print(os.getenv("OPEN_AI_KEY"))

# Function to connect to the MySQL database
def connect_to_mysql():
    # Connect to the database
    connection = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="faq"
    )
    return connection

# Function to execute SQL queries
def execute_sql_queries(connection, question):
    cursor = connection.cursor()

    # SQL query to check if the question exists in the database
    cursor.execute("SELECT answer FROM qa_table WHERE question = %s", (question,))
    row = cursor.fetchone()

    if row:
        return row[0]  # Return the answer from the database if the question exists
    else:
        # Generate an answer using OpenAI API if the question is not found in the database
        answer = generate_answer(question)

        # Add the new question and answer to the database
        cursor.execute("INSERT INTO qa_table (question, answer) VALUES (%s, %s)", (question, answer))
        connection.commit()  # Commit the transaction

        return answer

# Function to generate an answer using OpenAI API
def generate_answer(question):
    print("Generating answer for your question:", question)
    api_key = os.getenv("OPEN_AI_KEY")

    if api_key is None:
        raise ValueError("OPEN_AI_KEY environment variable is not set")

    openai.api_key = api_key

    response = openai.ChatCompletion.create(
        model="gpt-3.5-turbo",
        messages=[
            {"role": "system", "content": "You are a user asking a question."},
            {"role": "user", "content": question}
        ]
    )
    return response.choices[0].message['content']

# Main function
def main():
    # Connect to MySQL database
    connection = connect_to_mysql()

    # Ask the user for the question
    user_question = input("Enter your question: ")

    if not user_question:
        print("Please enter a question.")
        return

    try:
        # Execute SQL queries to retrieve the answer
        answer = execute_sql_queries(connection, user_question)
        print("Answer:", answer)
    except mysql.connector.Error as e:
        print("MySQL Error:", e)
    except ValueError as e:
        print("Error:", e)
    except openai.OpenAIError as e:
        print("OpenAI Error:", e)
    finally:
        # Close the connection
        connection.close()

if __name__ == "__main__":
    main()