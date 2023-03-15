<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./favicon.png">
  <title>ホームページ</title>
  <style>
    body {
      background-image:url("background.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    .header {
      position: fixed;
      color: white;
      display: block;
      max-width: 44ch;
    }
    h3 {
      margin-top: 0px;
    }
    .article {
      background-color: white;
      mask-image: linear-gradient(to right, rgba(0, 0, 0, 1.0) 50%, transparent 100%);
      border-radius: 3px;
      max-width: 140ch;
      margin: 0 auto;
      padding: 20px 15px;
      float: bottom;
      margin-bottom: 25px;
    }
    #DivForHoverItem {
      /*just so we can see it*/
      min-height: 30px;
    }
    #HiddenText {
      display: none;
    }
    #DivForHoverItem:hover #HiddenText {
      display:block;
    }

    /* Small Screens */
    @media only screen and (max-width: 600px) {
        .header {
            display: unset;
            max-width: unset;
            position: unset;
        }
        .article {
            max-width: unset;
        }
    }
  </style>
</head>

<div class="header">
  <h2 id="greet"></h2>
  <p id="date_and_time"></p>
<?php
  $sentence = exec("shuf -n 1 ./ja_en_sentences.csv");
  $sentence_exploded = explode("\t", $sentence);
  $sentence_jp = $sentence_exploded[1];
  $sentence_en = $sentence_exploded[3];
  echo "<div id=\"DivForJapapaneseSentence\"><p>" . $sentence_jp . "</p></div>";
  echo "<div id=\"DivForHoverItem\">
	    <div id=\"HiddenText\"><p>".$sentence_en."</p></div>
	    </div>"
?>
</div>

<body>
<div class="article">
  <h3>Apps</h3>
  <a href="http://10.0.0.2:8280/tt-rss/" target="_blank">tt-rss</a>
  <a href="https://protonmail.com" target="_blank">protonmail</a>
  <a href="https://calendar.protonmail.com" target="_blank">protoncalendar</a>
  <a href="https://yewtu.be/feed/subscriptions" target="_blank">youtube</a>
</div>

<div class="article">
  <h3>日本語</h3>
  <a href="https://www3.nhk.or.jp/news/easy/" target="_blank">nhk easy</a>
  <a href="https://tadoku.org/japanese/en/free-books-en/" target="_blank">多読</a>
  <a href="https://jisho.org" target="_blank">jisho</a>
</div>

<div class="article">
  <h3>VPN</h3>
  <a href="http://10.0.0.1:9091" target="_blank">transmission</a>
  <a href="http://10.0.0.1:5000" target="_blank">nas_local</a>
  <a href="http://10.0.0.2:8280/tt-rss" target="_blank">tt-rss</a>
  <a href="http://10.0.0.2:8281/tt-irc" target="_blank">tt-irc</a>
</div>

</body>
</html>

<script>
function greet() {
  let currentTime = new Date();
  let greet = Math.floor(currentTime.getHours() / 6);
  switch (greet) {
    case 0:
      document.getElementById("greet").innerHTML = "おやすみ";
      break;
    case 1:
      document.getElementById("greet").innerHTML = "おはよう";
      break;
    case 2:
      document.getElementById("greet").innerHTML = "こんにちは";
      break;
    case 3:
      document.getElementById("greet").innerHTML = "こんばんは";
      break;
  }
}

function date() {
  let currentDate = new Date();
  let dateOptions = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric"
  };
  let date = currentDate.toLocaleDateString("jp", dateOptions);
  let time = currentDate.toLocaleTimeString();
  document.getElementById("date_and_time").innerHTML = date + "<br/>" + time;
}

setInterval(date, 1000);
date();
greet();

</script>

<?php
?>
