from funciones import  FuncionRegistroCliente, VisualizarTodosLosClientes, RealizarUnaCompra, SegimientoDeUnaCompra
def menu():
    while True:
        print('\n 1-Registrar Cliente \n 2-Visualizar Clientes \n 3-Realizar Una Compra \n 4-Seguimineto de una compra \n 5-Salir')
        opcion = input('¿Que opcion quieres?: ')
        if opcion == '1':
            FuncionRegistroCliente() #Usamos la funcion para registrar Cliente
        elif opcion == '2':
            VisualizarTodosLosClientes()#Usamos la funcion para ver todos los clientes
        elif opcion == '3':
            RealizarUnaCompra() #Usamos la funcion para realizar una compra
        elif opcion == '4':
            SegimientoDeUnaCompra() #Usamos la funcion seguimiento de una compra
        elif opcion == '5':
            print('Has salido')
            break
        else:
            print('No has introducido el numero correcto')