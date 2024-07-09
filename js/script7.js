let time = 0;
let score = 0;
let salah = 0;
let hapus = 0;
let total_score = [];
let total_salah = [];
let total_hapus = [];
let index_salah = [];
let index_score = [];
let total_isi = [];
let isi = 0;
let timerInterval;
let numbers = [];
let baris = 1;
let max_kolom = 45;
let max_baris = 60;
let arr_baris = [];
let waktu = 30;
let nama;
let divisi;

$(document).ready(function () {
  $("#container-landing").show();
  $("#container-test").hide();
  $("#test-area").hide();
  $("#timer").hide();
  $(document).keydown(function (event) {
    if (event.which === 8) {
      // 8 adalah key code untuk backspace
      hapus++;
    }
  });
  const offset = 100; // Jarak tambahan dari atas
  $("input").focus(function () {
    const inputOffsetTop = $(this).offset().top;
    const scrollPosition =
      inputOffsetTop -
      $(window).height() / 3 +
      $(this).outerHeight() / 2 -
      offset;
    $("html, body").animate(
      {
        scrollTop: scrollPosition,
      },
      500
    );
  });
});

function startTest() {
  nama = $("#tbxNama").val();
  divisi = $("#tbxDivisi").val();
  $("#container-landing").hide();
  $("#container-test").show();
  if (nama != "" && divisi != "") {
    time = 0;
    score = 0;
    salah = 0;
    hapus = 0;
    total_score.length = 0;
    total_salah.length = 0;
    total_hapus.length = 0;
    index_salah.length = 0;
    index_score.length = 0;
    arr_baris.length = 0;
    numbers = generateNumbers(max_baris * max_kolom);
    for (let i = 1; i <= max_kolom; i++) {
      arr_baris.push(`Baris ${i}`);
    }
    console.log(numbers.toString());
    $("#test-area").show();
    displayNumbers(numbers);
    $("#btn-start").hide();
    $("#input-data").hide();
    $("#tutorial").hide();
    $("#timer").show();
    // Start timer
    clearInterval(timerInterval);
    timerInterval = setInterval(() => {
      time++;
      document.getElementById("timer").innerText = `Waktu: ${time}`;
      if (time % waktu == 0) {
        moveRow();
      }
    }, 1000);
  } else {
    Swal.fire({
      title: "Kesalahan",
      text: "Isi Data Terlebih Dahulu",
      icon: "error",
    });
  }
}

function generateNumbers(count) {
  let nums = [];
  for (let i = 0; i <= count; i++) {
    let num = Math.floor(Math.random() * 10);
    nums.push(num);
  }
  return nums;
}

function moveRow() {
  baris++;
  $(`.number:not(.n-${baris})`).hide();
  $(`.answer:not(.a-${baris})`).hide();
  $(`.number.n-${baris}`).show();
  $(`.answer.a-${baris}`).show();
  if (baris <= max_kolom) {
    total_score.push(score);
    total_hapus.push(hapus);
    total_salah.push(salah);
    total_isi.push(isi);
    /* console.log("Score : " + total_score);
    console.log("Hapus : " + total_hapus);
    console.log("Salah : " + total_salah);
    console.log("Index Salah : " + index_salah);
    console.log("Index Benar : " + index_score); */
    score = 0;
    salah = 0;
    hapus = 0;
    isi = 0;
    $(`#numbers-column-${baris}`).show();
    $(`#answers-column-${baris}`).show();
    const nextInput = document.getElementById(
      `answer-${baris}-${baris * max_baris - max_baris}`
    );
    nextInput.removeAttribute("readonly");
    nextInput.focus();
  } else {
    clearInterval(timerInterval);
    total_score.push(score);
    total_hapus.push(hapus);
    total_salah.push(salah);
    total_isi.push(isi);
    score = 0;
    salah = 0;
    hapus = 0;
    time = 0;
    baris = 1;
    $("#test-area").hide();
    $("#timer").hide();
    $(".isi").addClass("mr-5");
    $(`.number`).show();
    $(`.answer`).show();
    $("input[name=score]").val(total_score.toString());
    $("input[name=soal]").val(numbers.toString());
    $("input[name=baris]").val(max_baris);
    $("input[name=kolom]").val(max_kolom);
    $("input[name=waktukerja]").val(waktu);
    $("input[name=total_salah]").val(total_salah.toString());
    $("input[name=total_benar]").val(total_score.toString());
    $("input[name=total_hapus]").val(total_hapus.toString());
    $("input[name=index_salah]").val(index_salah.toString());
    $("input[name=index_benar]").val(index_score.toString());
    $("input[name=total_isi]").val(total_isi.toString());
    Swal.fire({
      title: "Berhasil",
      text: "Data Behasil Dikirim",
      icon: "success",
    });
    document.getElementById("form-test").submit();
    return;
  }
}

function displayNumbers(nums) {
  const testArea = document.getElementById("test-area");
  testArea.innerHTML = ""; // Clear previous content

  const fragment = document.createDocumentFragment();
  for (let i = 1; i <= max_kolom; i++) {
    const testDiv = document.createElement("div");
    testDiv.className = "d-flex isi";
    testDiv.innerHTML = `<div id="numbers-column-${i}" class="d-flex flex-column-reverse numbers-column"></div><div id="answers-column-${i}" class="d-flex flex-column-reverse answers-column" style="padding-bottom:17px;"></div>`;
    fragment.appendChild(testDiv);

    const numbersColumn = testDiv.querySelector(`#numbers-column-${i}`);
    const answersColumn = testDiv.querySelector(`#answers-column-${i}`);

    const numberFragment = document.createDocumentFragment();
    const answerFragment = document.createDocumentFragment();

    nums.forEach((num, index) => {
      if (index >= i * max_baris - max_baris && index < i * max_baris) {
        const numDiv = document.createElement("div");
        numDiv.innerHTML = `<div class="number n-${i} mt-4" id="number-${i}-${index}">${num}</div>`;
        numberFragment.appendChild(numDiv);
        if ((index + 1) % max_baris != 0) {
          const answerDiv = document.createElement("div");
          answerDiv.innerHTML = `<div class="answer a-${i}" style="margin-top:10px;"><input type="number" style="width:45px;" class="form-control text-center p-0 answer-input" id="answer-${i}-${index}" placeholder="?" onkeyup="debouncedCheckAnswer(event, ${index})" ${
            index == 0 && i == 1 ? "" : "readonly"
          }></div>`;
          answerFragment.appendChild(answerDiv);
        }
      }
    });
    numbersColumn.appendChild(numberFragment);
    answersColumn.appendChild(answerFragment);
  }
  testArea.appendChild(fragment);
  $(`.number:not(.n-${baris})`).hide();
  $(`.answer:not(.a-${baris})`).hide();
  $(`#answer-${baris}-0`).focus();
}

// Debounce function to limit the rate of function execution
function debounce(func, delay) {
  let debounceTimer;
  return function () {
    const context = this;
    const args = arguments;
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => func.apply(context, args), delay);
  };
}

const debouncedCheckAnswer = debounce(checkAnswer, 100);

function checkAnswer(event, index) {
  const answerInput = document.getElementById(`answer-${baris}-${index}`);
  const answer = parseInt(answerInput.value);
  if (isNaN(answer)) return;
  const correctAnswer = numbers[index] + numbers[index + 1];
  isi++;
  if (answer === Math.floor(correctAnswer % 10)) {
    score++;
    index_score.push(index);
  } else {
    salah++;
    index_salah.push(index);
  }
  if ((index + 2) % max_baris != 0) {
    const nextInput = document.getElementById(`answer-${baris}-${index + 1}`);
    nextInput.removeAttribute("readonly");
    nextInput.focus();
  }
}
