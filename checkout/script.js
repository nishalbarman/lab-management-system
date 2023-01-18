var sub = 0;

var hash = "<?php echo $part1 ?>";

function submitPayuForm() {
  if (hash == "") {
    return;
  }
  var payuForm = document.forms.payuForm;
  payuForm.submit();
}

timeLeft = 10;

function countdown() {
  if (sub != 0) {
    timeLeft = 1;
  }
  timeLeft--;
  document.getElementById("seconds").innerHTML = String(timeLeft);

  if (timeLeft > 1) {
    if (timeLeft == 8) {
      document.getElementById("button").style.display = "block";
    }
    setTimeout(countdown, 1000);
  } else {
    if (sub == 0) {
      var payuForm = document.forms.payuForm;
      submitPayuForm();
    }
  }
}

tLeft = 15;

function buttonCount() {
  tLeft--;
  document.getElementById("seconds").innerHTML = String(tLeft);
  if (tLeft > 1) {
    setTimeout(buttonCount, 1000);
  } else {
    document.getElementById("button").style.background = "#4CAF50";
    document.getElementById("button").disabled = false;
  }
}

setTimeout(countdown, 1000);

function timerStop() {
  sub = 1;
  document.getElementById("button").disabled = true;
  document.getElementById("button").style.background = "grey";
  tLeft = 15;
  buttonCount();
  var payuForm = document.forms.payuForm;
  submitPayuForm();
}
