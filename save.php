body{
    background: #999999;
}

img {
    margin-top: 2.5%;
    width: 15%;
    max-height: 15%;
    /*margin-left: 40%;*/
}

page {
    background: white;
    display: block;
    margin: 0 auto;
    /*margin-top:1%;
    margin-bottom: 1%;*/
    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
.page{
    position: absolute;
    top: 0%;
    left: 0%; 
    margin-left: 20%;
}
page[size="A4"] {  
   
    width: 21cm;
    height: 29.7cm; 
}

.border{
    border: solid black;
    border-width: thin;
    height: 93%;
    width:  90%;
    margin-top: 2.55%;
    margin-left: 4.9%;
    /*bottom: 0%;*/
}
h1{
    margin-top: 4%;
}

h1, h2, h3{
    margin-left: 3%;
    font-size: 110%;
}

h2, h3{
    margin-top: 4%;
}

.details, .details3{
    width: 90%;
    margin-left: 5%;
}

.details, .details2, .details3{
    font-size:75%;
    font-family: Arial;
    line-height: 1.8;
}

label{
    font-weight: bold;
}

hr{
    width: 79.5%;
    margin-bottom: 1.5%;
    margin-top: 1.5%;
    margin-left: 10%;
}

.details2{
    margin-right: 2.5%;
}

.e_date{
    margin-right: 35%;
}

.button{
        display: flex;
        justify-content: flex-end;
        margin-top: 1.8%;
        margin-right: 1.8%;
}

/*@media print {
    html, body {height: 50%; background: black;}
    body {
        background-color: white;
    }
    page {
        background-color: white;
        box-shadow:none;
    }
    button{
        display: none;
    }
  }
*/