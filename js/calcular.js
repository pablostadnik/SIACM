function calcular()
{	
	

	final=document.getElementById("final");
        

     if (final.value!="")
  	{
	fecha= document.getElementById("fecha");
	var suma=final.value-fecha.value;
	
	document.getElementById("resul_4").value=suma;
	}	

}
function calcular2()
{
	
	anio1=document.getElementsByName("anio1_1")[0];
    anio2=document.getElementsByName("anio2_2")[0];
    final2=document.getElementsByName("final2")[0];
    fecha2=document.getElementsByName("fecha2")[0];
    
     if (anio1.value==anio2.value)
  	{
  		
	
	var suma=final2.value-fecha2.value;

	document.getElementById("resul_5").value=suma;
		  
	}else{
		var suma1 = (12-fecha2.value);
		var suma2 = final2.value;
		var suma =parseInt(suma1)+parseInt(suma2)
		document.getElementById("resul_5").value=suma;
	}

	

}
function calcular3()
{
	
	anio3=document.getElementsByName("anio3")[0];
    anio4=document.getElementsByName("anio4_4")[0];
    final3=document.getElementsByName("final3")[0];
    fecha3=document.getElementsByName("fecha3")[0];
    
     if (anio3.value==anio4.value)
  	{
  		
	
	

	var suma=fecha3.value-final3.value;
	document.getElementById("resul_6").value=suma;
		  
	}else{
	
		var suma=((parseInt(anio4.value)-parseInt(anio3.value))*12)+(fecha3.value-final3.value);

		document.getElementById("resul_6").value=parseInt(suma);
	}

}
function calcular4()
{
	
	anio5=document.getElementsByName("anio5")[0];
    anio6=document.getElementsByName("anio6")[0];
    final4=document.getElementsByName("final4")[0];
    fecha4=document.getElementsByName("fecha4")[0];
    
     if (anio5.value==anio6.value)
  	{
  		
	

	var suma=fecha4.value-final4.value;
	document.getElementById("resul_7").value=parseInt(suma);
		  
	}else{
		var suma=((parseInt(anio6.value)-parseInt(anio5.value))*12)+(fecha4.value-final4.value);
		
		document.getElementById("resul_7").value=parseInt(suma);
	}

}
function calcularprim()
{
valor1=document.getElementsByName("valor1")[0];
reg1=document.getElementsByName("reg1")[0];
tdc1=document.getElementsByName("tdc1")[0];

num=valor1.value*reg1.value;

num2= num.toFixed(2);

tdc1.value= num2;


}
function calcularsegu()
{
valor2=document.getElementsByName("valor2")[0];
reg2=document.getElementsByName("reg2")[0];
tdc2=document.getElementsByName("tdc2")[0];

num=valor2.value*reg2.value;

num2= num.toFixed(2);
tdc2.value= num2;


}
function calcularter()
{
valor3=document.getElementsByName("valor3")[0];
reg3=document.getElementsByName("reg3")[0];
interes3=document.getElementsByName("interes3")[0];
tdc3=document.getElementsByName("tdc3")[0];

resul_6=document.getElementById("resul_6").value;
num=(valor3.value*reg3.value)*(1+(resul_6*interes3.value));

num2= num.toFixed(2);

tdc3.value= num2;
}
function calcularcuar()
{

valor4=document.getElementsByName("valor4")[0];
antireg4=document.getElementsByName("antireg4")[0];
interes4=document.getElementsByName("interes4")[0];
tdc4=document.getElementsByName("tdc4")[0];

resul_7=document.getElementById("resul_7").value;
num=(valor4.value*antireg4.value)*(1+(resul_7*interes4.value));

num2= num.toFixed(2);
tdc4.value=num2;
}