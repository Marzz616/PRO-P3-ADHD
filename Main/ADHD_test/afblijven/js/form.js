document.addEventListener("DOMContentLoaded",function(){

    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();

        let totalPoints = 0;
        

        for (let i = 1; i <= 10; i++) {
            let selectedValue = document.querySelector(`input[name="vraag${i}"]:checked`);
            let errorContainer = document.querySelector(`#vraag${i}-error`);

            if (!selectedValue) {
                if(!errorContainer.innerHTML)
                {
                errorContainer.innerHTML = "vul alsjeblieft deze vraag in";
                return
                }
                
            }else{
                let value = selectedValue.value;
                errorContainer.innerHTML = "";
                
                
                if (value === "sterk") {
                    totalPoints += 2;
                    document.getElementById(`vraag-${i}`).setAttribute('value', 'S');
                } else if (value === "neutraal") {
                    totalPoints++;
                    document.getElementById(`vraag-${i}`).setAttribute('value', 'N');
                }else if(value === "zwak"){
                    totalPoints += 0;
                    document.getElementById(`vraag-${i}`).setAttribute('value', 'Z');
                }
            
                
            }
        }

        console.log("Totaal aantal punten:", totalPoints);
        document.getElementById('total-points').setAttribute('value', totalPoints);

        
        const formElement = document.querySelector('.vragenlijst');
        const persoonElement = document.querySelector('.persoonsgegevens');

        formElement.style.display = 'none';
        persoonElement.style.display = 'flex';

        

        

});
});

console.log("Dit werkt");
let test = 8;