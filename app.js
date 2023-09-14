const userChoiceDisplay = document.getElementById('user-choice')
const computerChoiceDisplay = document.getElementById('computer-choice')
const resultDisplay = document.getElementById('result')
const maybeChoices = document.querySelectorAll('button')

let userChoice
let computerChoice
let result

maybeChoices.forEach(maybeChoice => maybeChoice.addEventListener('click', (e) => {
    userChoice = e.target.id
    userChoiceDisplay.innerHTML = userChoice
    computerRandom()
}))
function computerRandom(){
    const number = Math.floor(Math.random()*3)
    switch (number) {
        case 0:
            computerChoice = "papier" //papper
            break;
        case 1:
            computerChoice = "kamien" //rock
            break;
        case 2:
            computerChoice = "nozyce" //scissor
            break;
        default:
            computerChoice = "Error"
            break;
    }
    computerChoiceDisplay.innerHTML = computerChoice
    results()
}
function results(){
    result = "wygrana" //win
    if(computerChoice === userChoice){
        result = "remis" //draw
    } 
    if (computerChoice === "papier" && userChoice ==="kamien"){
        result ="przegrana" //lose
    } 
    if (computerChoice === "kamien" && userChoice ==="nozyce"){
        result ="przegrana" //lose
    } 
    if (computerChoice === "nozyce" && userChoice ==="papier"){
        result ="przegrana" //lose
    } 
    resultDisplay.innerHTML = result;
}

