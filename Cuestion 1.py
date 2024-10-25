#Cuestion 1
while True:
    print(" \n (1-Cuadrado) \n (2-Rectangulo) \n (3-Salir)") #Aqui creamos el menu, el \n hace que aparezcan en diferentes lineas
    numero = input("Eligue un nuemro: ")#Le solicitamos un numero de los dados para saber que quiere calcular
    if numero == "3": #Para salir del programa
        print("Has salido")
        break
    elif numero == "1":
        ladoCuadrado = int(input("Dame el lado del cuadrado: ")) #Aqui la longitud del lado del cuadrado
        for i in range(ladoCuadrado): #Todos los lados son iguales
            print("*" * ladoCuadrado) #Que imprima toda la fila, depede el numero que nos den, dibujara mas o menos
        print(f"El area del cuadrado es: {ladoCuadrado * ladoCuadrado}") #Para calcular el area necesitamos multiplicar lado por lado
        print(f"El perimetro del cuadrado es: {ladoCuadrado * 4}") # Aqui sumamos todos los lados para calcular el perimetros
    elif numero == "2":
        BaseRectangulo = int(input("Dame la base del rectangulo: ")) #Solicitamos base rectangulo
        AlturaRectangulo = int(input("Dame la altura del rectangulo: ")) #Solicitamos altura rectangulo
        for i in range(AlturaRectangulo): #Usamos de rango la altura, esto le va servier para pintar
            print("*" * BaseRectangulo) #Que imprima toda la fila, depede el numero que nos den, dibujara mas o menos
        print(f"El area del rectangulo es: {BaseRectangulo * AlturaRectangulo}")
        print(f"El perimetro del rectangulo es: {(BaseRectangulo + AlturaRectangulo)*2}")
    else:
        print("error, intentelo otra vez")#Esto en caso de que no den ni 1, 2 o 3    