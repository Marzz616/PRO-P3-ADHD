document.addEventListener("DOMContentLoaded",function(){

    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();

        let totalPoints = 0;
        

        for (let i = 1; i <= 1; i++) {
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
                let s = 0;
                let n = 0;
                let z = 0;
                if (value === "sterk") {
                    totalPoints += 2;
                    s++;
                } else if (value === "neutraal") {
                    totalPoints++;
                    n++;
                }else if(value === "zwak"){
                    totalPoints += 0;
                    z++;
                }
            
                
            }
        }

        console.log("Totaal aantal punten:", totalPoints);
        setTimeout(function(){
            if(totalPoints>1)
            {
                if(confirm("Er is een grote kans dat u last van ADHD heeft. Een huisarts-afspraak is aan te raden voor een officiële medische check.\n \n \n Wilt u meteen naar praktijken bij u in de buurt "))    
                {
                    window.location.href = "https://www.google.com/";
                }else{
                    window.location.href = "file:///C:/projects2023school/ProjectP3/PRO-P3-ADHD/Youri/form.html";
                };
            }else if(totalPoints>0)
            {
                alert("Het kan zijn dat u last heeft van ADHD misschien is een afspraak met de huisarts handig om vast te stellen ofdat u ADHD ofdat de klachten elders vandaan komen.\nOp de website hebben we een generator voor huisartsen bij u in de buurt.");
            }else{
                alert("Afhankelijk van deze test heeft u weinig last van klachten van ADHD. Mocht u toch nog zorgen hebben kan u altijd een apotheek of huisarts bij u in de buurt vinden.");
            }
        }, 1000);
        

});
});

console.log("Dit werkt");