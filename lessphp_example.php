<?php
    include_once("./lessphp/lessc.inc.php");

    $less = new lessc();

    $css = $less->compile("
    *
    {
        font-family: Verdana;
        padding: 0px;
        margin: 0px;	
    }

    a
    {
        text-decoration: none;

    }

    @backgroundColor: #FF33FF;
    @divWidth: 400px;
    @placeHolder: auto;
    @lightUp: 30%;

    @factor1: 1.1;
    @factor2: 2;

    @color1: #F3F;
    @color2: #A3F;

    @tabelWidth:200px;

    //Dit is een geparameeterde=() mixin met guard=when
    .lessIntro(@factor, 
               @backgroundColor, 
               @divWidth:400px, 
               @placeHolder: auto, 
               @passThrough:false) 
               when ((@factor1 > 1) 
               and (@placeHolder = auto)), 
               (@passThrough)
    {
        border: @factor * 0.5em solid lighten(@backgroundColor, @lightUp);
        width: @factor * @divWidth;
        padding: @factor * 1em;
        background-color: @backgroundColor;
        color: darken(@backgroundColor, 35%);
        margin: 2em @placeHolder;
        font-size: @factor * 1.5em;
        border-radius: 50px;
    }

    #div1
    {
        .lessIntro(@factor1, @color1, 300px, 100px, true);
    }
    #div2
    {
        .lessIntro(@factor2, @color2, 500px);
    }

    @margin: 2em;
    @border: 2px solid black;
    @borderCollapse: collapse;
    //Dit is een geparameeterde=() mixin met guard=when
    .tblDefault(@margin, @border, @color, @padding, @borderCollapse:collapse)   
    {
        border-collapse: @borderCollapse;
        margin-top: 2em;

        td
        {
            border: @border @color;
            margin: @margin;
            padding: @padding;
        }
        th
        {
            border: @border @color;
            margin: @margin;
            padding: @padding;
            background-color: darken(@color, 20%);
            color: lighten(@color, 20%);
        }
        tr:nth-child(2n+1) {
            background: darken(@color, 10%);
        }
        tr:nth-child(2n) {
            background: lighten(@color, 10%);
        }


    }

    #oefeningDiv1
    {
        .tblDefault(2em, 3px solid, green, 1em, collapse);
    }
    #oefeningDiv2
    {
        .tblDefault(2em, 3px solid, brown, 1em, collapse);
    }



    /* Maak een nieuwe pagina die 2 verschillende tabellen laat zien met 
    ieder 5 records. De opmaak van de tabellen moet worden geregeld door 
    dezelfde geparametriseerde LESS mixin met guard. */
    ");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LESS oefening</title>
        <!--
		<link rel="stylesheet/less" type="text/css" href="./style.less">
        <script src="./less.js/dist/less.js"></script>
        -->
        <style><?php echo $css; ?></style>
	</head>	
	<body>
        <h3>Oefening LESS</h3>
        <div id="oefeningDiv1">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Rob</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Harry</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mccree</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Tracer</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Winston</td>
                </tr>
            </table>
        </div>
        <div id="oefeningDiv2">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                </tr>
                <tr>
                    <td>101</td>
                    <td>Widowmaker</td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Mei</td>
                </tr>
                <tr>
                    <td>103</td>
                    <td>Bastion</td>
                </tr>
                <tr>
                    <td>104</td>
                    <td>Roadhogg</td>
                </tr>
                <tr>
                    <td>105</td>
                    <td>Reinhart</td>
                </tr>
            </table>
        </div>
	</body>
</html>