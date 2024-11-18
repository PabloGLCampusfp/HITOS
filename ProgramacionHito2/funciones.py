Clientes = [] #Creamos una lista
Productos = {
    'patatas': '2€',
    'pepinos': '4€',
    'tomates': '6€',
    'albaricoques': '6€',
    'coliflores': '3€',
    'platanos': '4€',
    'melon':'10€'
} #Creamos un diccionario
TodosLosProductos = [] #Creamos una lista
contador = 1 #Creamos una variable para llevar la cuenta de pedidos
def FuncionRegistroCliente(): #Cremos una funcion
    DNI = input("Dame el DNI del Cliente: ") #Input para solicitar el DNI
    if DNI in Clientes: #Que revise si el DNI ya esta registrado en la tabla clientes
        print("DNI YA REGISTRADO, porfavor introduzca uno que no este registrado") #Si si lo esta que salga esto
        return
    nombre = input("Dame el nombre del cliente: ") #Si no esta el DNI registrado, input para solicitar el nombre
    Numero = int(input("Dame el numero del cliente: ")) # igual que el nombre pero con el numero
    Clientes.append({"DNI":DNI, "nombre":nombre, "Numero":Numero}) #Asi añadimos a la tabla clientes, tanto el DNI, como nombre, como el numero
    print('Se ha añadido correctamente')
def VisualizarTodosLosClientes(): #Cremos una funcion
    print(Clientes)# Mostramos todos los clientes
    busqueda = input('Dame el dni de la persona que buscas: ') #input para introducir el DNI
    for patata in Clientes: #Usamos patata en clientes
        if patata["DNI"] == busqueda: #esto lo que hace, es que busque en la tabla clientes, que ha mirado 1 por 1 patata, buscando el DNI, que cuadre con el dado
            print(patata)
def RealizarUnaCompra(): #Cremos una funcion
    global contador #para poder usar la variable contador, ya que esta fuera de la funcion
    Identificarse = input('Introduce el DNI de quien vaya a hacer el pedido: ') #solicitamos el DNI
    lista = [] #Creamos una lista
    print(Productos) #mostramos todos los productos
    while True: #Creamos un while
        compra = input('Añade lo que quieras comprar, (pon fin para dejar de comprar): ')#Solicitamos tantas veces hasta que el usuario ponga fin que cosas quiere añadir a la cesta
        if compra == 'fin': #Aqui hacemos que si pone fin se acabe
            break
        lista.append(compra) #Vamos añadiendo a la cesta los productos que necesitemos
        print('Se ha añadido el producto a tu carrito') #cada vez que añademos algo nos dira que se ha añadido correctamente
    CompraUsuario = {'DNI':Identificarse, 'pedido':lista, 'contador':contador} #cremos un diccionario, en base a lista, el DNI, el contador
    TodosLosProductos.append(CompraUsuario)# añadimos el diccionario añadido anteriormente a la lista TodosLosProductos
    print(f'Este ha sido el pedido numero {contador}') #Mostramos el numero del pedido
    contador = contador + 1 #`cada vez que hagamos un pedido se añadira 1 al contador`
def SegimientoDeUnaCompra(): #Cremos una funcion
    QuePedidoEs = int(input('Dame el numero del pedido que quieres ver: ')) #Solicitamos el numero del pedido
    for pipinillos in TodosLosProductos: #pepinillos mirara en 1 por 1 en toda la lista TodosLosProductos
        if QuePedidoEs == pipinillos['contador']: #Para confirmar si el pedido existe
            for aguacate in Clientes: #aguacate mirara 1 por 1 los clietes
                if aguacate['DNI'] == pipinillos['DNI']: #Esto mirara si  en aguacate ahi un DNI igual que en pipinillos
                    print(aguacate) #Si si hay, mostrara aguacate
            print(pipinillos['pedido']) #mostramos el pedido de pepinillos
            break

    