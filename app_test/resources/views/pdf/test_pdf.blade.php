<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PDF Test</title>
<style type="text/css">
@font-face{
    font-family:ipamp;
    font-style:normal;
    font-weight:normal;
    src: url('{{storage_path('fonts/ipamp.ttf')}}') format('truetype');
}
 
@font-face{
    font-family:ipamp;
    font-style:bold;
    font-weight:bold;
    src: url('{{storage_path('fonts/ipamp.ttf')}}') format('truetype');
}
@font-face{
    font-family:ipagp;
    font-style:normal;
    font-weight:normal;
    src: url('{{storage_path('fonts/ipagp.ttf')}}') format('truetype');
}
 
@font-face{
    font-family:ipagp;
    font-style:bold;
    font-weight:bold;
    src: url('{{storage_path('fonts/ipagp.ttf')}}') format('truetype');
}
body{
    font-family:ipagp !important;
}
.mincho{
    font-family:ipamp !important;
}
.gothick{
    font-family:ipagp !important;
}
.bold{
    font-weight:bold;
}
.red{
    color:red;
}
table{
    width:80%;
}
td{
    border:solid 1px #333;
    padding:2px 4px 2px 4px;
}
hr{
    color:#666;
}
.text-center{
    text-align:center;
}
.text-right{
    text-align:right;
}
.logo{
    width:150px;
    height:60px;
}


</style>
</head>
<body>
<h4>{{$today_text}}</h4>
<div class="text-right">
	<img src="{{asset('images/hotel1.jpg')}}" class="logo">
</div>
<h1 class="text-center">見出し1</h1>
<h2 class="text-right">見出し2</h2>
<h3 class="mincho red">{{$data}}</h3>
<h4>{{$today_text}}</h4>
<h5>見出し5</h5>
<h6>見出し6</h6>
<hr>
<p class="gothick">ウクライナ危機で先鋭化した米国とロシアの対立が、冷戦期を彷彿とさせる様相を呈している。<br>
3月にはソ連崩壊後初めて、<span class="mincho bold red">ロシアで活動していた米主要紙の記者がスパイ容疑</span>で逮捕され、<br>
4月に外国大使らが出席して行われた信任状奉呈式で、プーチン大統領は米大使に<br>
「ウクライナ危機は米国が原因だ」と突きつけた。</p>
<table><!-- 自動改行されないからbrいれる -->
<tr>
<td class="text-center">記事画像</td><td class="text-center">記事</td>
<td>3</td><td>4</td><td>5</td>
</tr>

<tr>
<td><img src="{{asset('images/001-120.jpg')}}" width="300"></td>
<td>
<p>ウクライナ危機で先鋭化した米国とロシアの対立が、<br>
冷戦期を彷彿とさせる様相を呈している。<span class="bold">3月にはソ連崩壊後</span><br>
初めて、ロシアで活動していた米主要紙の記者がスパイ容疑<br>
で逮捕され、4月に外国大使らが出席して行われた信任状奉<br>
呈式で、プーチン大統領は米大使に「ウクライナ危機は米国<br>
が原因だ」と突きつけた。
侵攻開始から2年目を迎えても戦況が打開できず、<br>
無謀な戦略で自軍の人的損害が増え続けるなか、<br>
プーチン政権は苦境の理由を米国に押し付けて、<br>
国民の目を外に向けるほかはない。ウクライナ危機の長期化<br>
が確実視されるなか、両国間の対立は今後も悪化の一途をた<br>
どることが確実だ。</p>
</td>

<td>3</td><td>4</td><td>5</td>
</tr>

</table>
</body>
</html>