import os
import openai
from dotenv import load_dotenv
print(os.getenv("OPEN_AI_KEY"))

load_dotenv()
# Function to generate an answer using OpenAI API
def generate_answer(question):
    print("Generating answer for your question:", question)
    api_key = os.getenv("OPENAI_API_KEY")

    if api_key is None:
        raise ValueError("OPENAI_API_KEY environment variable is not set")

    openai.api_key = api_key

    response = openai.ChatCompletion.create(
        model="gpt-3.5-turbo",
        messages=[
            {"role": "system", "content": "You are a user asking a question."},
            {"role": "user", "content": question}
        ],
        max_tokens=100,  # Max number of tokens for the completion
        stop=["\n"]  # Stop generating after one sentence
    )
    return response.choices[0].message['content']

# Main function
def main():
    # Ask the user for the question
    user_question = input("Enter your question: ")

    if not user_question:
        print("Please enter a question.")
        return

    try:
        # Generate answer using OpenAI API
        answer = generate_answer(user_question)
        print("Answer:", answer)
    except ValueError as e:
        print("Error:", e)
    except openai.OpenAIError as e:
        print("OpenAI Error:", e)

if __name__ == "__main__":
    main()