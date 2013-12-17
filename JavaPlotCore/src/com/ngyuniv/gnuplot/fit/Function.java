package com.ngyuniv.gnuplot.fit;

public class Function {

	
  private static StringBuffer sbfinalFunc = new StringBuffer();

public static double  mul(double x,double y){
		
	sbfinalFunc.append("xxxx");
	 System.out.println("---"+sbfinalFunc.toString());
		return x*y;
		
	}
	public static double  exp(double x){
		
		sbfinalFunc.append("exp(x)");
		 System.out.println("---"+sbfinalFunc.toString());
		return Math.exp(x);
		
	}
	
	public static double  cos(double x){
		
		sbfinalFunc.append("cos(x)");
		 System.out.println("---"+sbfinalFunc.toString());
		return Math.cos(x);
		
	}
	
	
	

}
