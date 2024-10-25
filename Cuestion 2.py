#Cuestion 2
import random #necesario para hacer cosas con el comando ramdon
puntacionJugador = 0 #Para tener un contador de las partidas ganadas del jugador
puntacionMaquina = 0 #Para tener un contador de las partidas ganadas de la maquina
opciones = ["Piedra", "Papel", "Tijera"] #Para luego poder hacer referencia a ella
while True:
    if puntacionJugador == 3:
        print("Has Ganado!! Enorabuena") # Si nuestra puntuacion ha llegado a 3, ganemos
        break #Esto hara que si ganamos ya acabe 
    elif puntacionMaquina == 3:
        print("Has perdido, la proxima vez tendras mas suerte") #Si la puntuacion de la maquina ha llegado a 3, perdemos
        break
    print(" \n (1-Piedra) \n (2-Papel) \n (3-Tijera)") #Aqui hacemos que podamos ver las diferentes opciones
    jugada = int(input("Que jugada quieres hacer: ")) #Solicitamos que nos den una de las 3 opciones
    if jugada in range (1,4): #Haciendo esto hacemos que no nos de error cuando pongan un numero que no es
        jugadamaquina = random.randint(1,3) # Esto hara que la maquina cree un numero aleatorio del 1 al 3
        print(f"La jugada de la maquina a sido {opciones[jugadamaquina -1]}, y la tuya {opciones[jugada -1]}") #Esto hara que nos imprima que hemos jugado cada uno
        if (
            (jugadamaquina == 1 and jugada == 3)
            or (jugadamaquina == 2 and jugada == 1)
            or (jugadamaquina == 3 and jugada == 2)   
            ):
            print("Has perdido") #Si salen uno de los resultados anteriores se mostrara que hemos perdido
            puntacionMaquina = puntacionMaquina + 1
            print(f"Llevas {puntacionJugador} puntos")
            print(f"Llevas {puntacionMaquina} puntos")
        elif (
            (jugadamaquina == 1 and jugada == 2)
            or (jugadamaquina == 2 and jugada == 3)
            or (jugadamaquina == 3 and jugada == 1)  
            ):
            print("Has Ganado") #Si salen uno de los resultados anteriores se mostrara que hemos ganado
            puntacionJugador = puntacionJugador + 1
            print(f"Llevas {puntacionJugador} puntos")
            print(f"Llevas {puntacionMaquina} puntos")
        else:
            print("Empate nadie se llava un punto") #Si sale cualquier resutado diferente de todos los anteriores sera empate
            print(f"Llevas {puntacionJugador} puntos")
            print(f"Llevas {puntacionMaquina} puntos")
    else:
        print("Que sea 1, 2 o 3")#Mensaje que saldra si introducen un numero que no es