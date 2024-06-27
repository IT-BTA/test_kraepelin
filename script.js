let time = 0;
let score = 0;
let total_score = [];
let timerInterval;
let numbers = [];
let baris = 1;
let jml_baris = 5;
let max_baris = 4;
let arr_baris = [];
let waktu = 2;

function startTest() {
    // Reset variables
    time = 0;
    score = 0;
    baris = 1;
    total_score.length = 0;
    arr_baris.length = 0;
    numbers = generateNumbers(max_baris*jml_baris);
    for(let i = 1; i<=jml_baris; i++){
        arr_baris.push(`Baris ${i}`);
    } 
    displayNumbers(numbers);

    // Start timer
    clearInterval(timerInterval);
    timerInterval = setInterval(() => {
        time++;
        document.getElementById('timer').innerText = `Waktu: ${time}`;
        if (time % waktu == 0) {
           moveRow();
        }
    }, 1000);

}

function generateNumbers(count) {
    let nums = [];
    for (let i = 0; i <= count; i++) {
        let num = Math.floor(Math.random() * 10);
        nums.push(num);
    }
    return nums;
}

function moveRow(){
    baris++;
    if(baris <= jml_baris){
        total_score.push(score);
        score =0;
        document.getElementById(`answer-${baris}-${(baris*max_baris)-max_baris}`).removeAttribute('readonly');
        document.getElementById(`answer-${baris}-${(baris*max_baris)-max_baris}`).focus();
    }else{
        clearInterval(timerInterval);
        total_score.push(score);
        score =0;
        time=0;
        baris = 1;
        document.getElementById('test-area').innerHTML = '';
        alert('Selesai');
        const ctx = document.getElementById('chart-hasil');
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: arr_baris,
            datasets: [{
              label: 'Score',
              data: total_score,
              borderWidth: 1
            }]
          },
          scales: {
            y: {
                min: 0,
                max: max_baris-1,
              },
            yAxes: [{
               ticks: {
                  stepSize: 1
               }
            }]
         },
          
        });
        return;
    }
    
}

function displayNumbers(nums) {
    const testArea = document.getElementById('test-area');
    for(let i = 1;i<=jml_baris;i++){
        const testDiv = document.createElement('div');
        testDiv.className = "d-flex mr-5";
        testDiv.innerHTML = `<div id="numbers-column-${i}" class="d-flex flex-column"></div><div id="answers-column-${i}" class="d-flex flex-column" style="padding-top:17px;"></div>`;
        testArea.appendChild(testDiv);
        const numbersColumn = document.getElementById(`numbers-column-${i}`);
        const answersColumn = document.getElementById(`answers-column-${i}`);
        nums.forEach((num, index) => {
            if(index >= (i*max_baris) - max_baris && index < i*max_baris){
                const numDiv = document.createElement('div'); 
                numDiv.innerHTML = `<div class="number mb-4" id="number-${i}-${index}">${num}</div>`;
                numbersColumn.appendChild(numDiv);
                if (index < nums.length - 1) {
                    if((index+1)%max_baris != 0){
                    if(index == 0 && i == 1){
                        const answerDiv = document.createElement('div');
                        answerDiv.innerHTML = `<div class="answer" style="margin-bottom:10px;"><input type="text" style="width:45px;" class="form-control text-center p-0 answer-input" id="answer-${i}-${index}" placeholder="?" onkeyup="checkAnswer(event, ${index})"></div>`;
                        answersColumn.appendChild(answerDiv);
                    }else{
                        const answerDiv = document.createElement('div');
                        answerDiv.innerHTML = `<div class="answer" style="margin-bottom:10px;"><input readonly type="text" style="width:45px;" class="form-control text-center p-0 answer-input" id="answer-${i}-${index}" placeholder="?" onkeyup="checkAnswer(event, ${index})"></div>`;
                        answersColumn.appendChild(answerDiv);
                    }
                }
                }
            }
        });
    }
}

function checkAnswer(event, index) {
    const answerInput = document.getElementById(`answer-${baris}-${index}`);
    const answer = parseInt(answerInput.value);
    if (isNaN(answer)) return;
    const correctAnswer = numbers[index] + numbers[index + 1];
    console.log('Jawaban Benar : '+Math.floor(correctAnswer % 10));
    if (answer === Math.floor(correctAnswer % 10)) {
        score++;
        console.log("Skor : "+ score);
    }
    if((index+2)%max_baris != 0){
        document.getElementById(`answer-${baris}-${index+1}`).removeAttribute('readonly');
        document.getElementById(`answer-${baris}-${index+1}`).focus();
    }
}
