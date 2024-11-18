contadorResta = 0
contadorSuma = 0
while True:
    salarioInicial = float(input("Introduce el salario inicial: "))
    if salarioInicial > 0: #Aqui hacemos que si el salario iniciar es mayor a 0, se acabe el bucle
        break
    elif salarioInicial < 0:#Pero si es menor a 0, nos pedira que lo hagamo otra vez
        print("Tiene que ser mayor a 0, introduzcalo otra vez")
while True:
    print("\n 1-Ingresar \n 2-Retirar dinero \n 3-Mostrar sueldo \n 4-Salir \n 5-Estadisticas") #Creamos el menu
    opcion = int(input("Elije una opcion: "))
    if opcion == 1:
        dineroañadido = float(input("¿Cuanto dinero quieres añadir?: "))
        salarioInicial = salarioInicial + dineroañadido #Para que se nos guarde la suma de dinero
        contadorSuma = contadorSuma + 1 #Esto nos sirve para la opcion 5
        if dineroañadido < 0: #Esto hace que no puedas poner numeros negativos
            print("No haceptamos numeros negativos, porfavor vuelve a intentarlo")
    elif opcion == 2:
        retirardinero = float(input("¿Cuanto dineor quieres retirar?: "))
        if retirardinero < 0: #Esto hace que no puedas poner numeros negativos
            print("No haceptamos numeros negativos, porfavor vuelve a intentarlo")
        elif retirardinero > salarioInicial: #Esto impide que puedas retirar mas de lo que tienes
            print("Estas en numeros rojos")
        else: 
            salarioInicial = salarioInicial - retirardinero #Para que se guarde la resta  de dinero
            contadorResta = contadorResta + 1 # Esto nos sirve para la opcion 5
    elif opcion == 3:
        print(f"Tienes {salarioInicial} de saldo") #Nos muestra el saldo
    elif opcion == 5:
        print(f"Has ingresado dinero {contadorSuma} veces, y has restado dinero {contadorResta} veces") #Nos muestra cuantas veces hemos metido dinero o hemos sacado
    elif opcion == 4:
        break #Esta ultima opcion hace que el programa se cierre