import os
import random

def view():
    os.system('cls')
    print(".....................CARRERA NÚMERICA.....................")


def cantidadPlayers():
    view()
    print("La Carrera Númerica puede ser jugado con 2 o maximo 4 jugadores")
    x = int(input("Cuantos jugadores entran al juego : "))
    if x >=2 and x <= 4:
        return x
    else:
        print("Solo es permitido minimo 2 y maximo 4 jgadores")
        cantidadPlayers()

def level(y, x):
    A = '''
           INICIO |    |   |   |   |    |   |   |     |    |    |   |   |    |   |   |   |    |   |   |   |  FINAL      
        '''
    player_01 = 0
    player_02 = 0
    player_03 = 0
    player_04 = 0
    INICIO = 1

    if y == 1:
        FINAL = 20
    elif y == 2:
        FINAL = 30
    elif y == 3:
        FINAL = 50

    while INICIO <= FINAL:
        for i in range(x):
            view()
            print("Total de jugadores : ",x,"           Nivel:  ",y)
            print(A)
            key = input("Pulsa tecla ENTER para continuar ...")
            posicion = random.randrange(1,6)
            print("player-0",(i+1)," posicion: ",posicion)

            if i == 0:
                player_01 = player_01 + posicion
                print('Puesto actual jugador 1: ', player_01)
            elif i == 1:
                player_02 = player_02 + posicion
                print('Puesto actual jugador 2: ', player_02)
            elif i == 2:
                player_03 = player_03 + posicion
                print('Puesto actual jugador 3: ', player_03)
            elif i == 3:
                player_04 = player_04 + posicion
                print('Puesto actual jugador 4: ', player_04)

            key = input("Pulsa tecla ENTER para continuar ...")

        os.system('cls')    
        if player_01 >= FINAL:
            INICIO = player_01
            print('El jugador número 1 es el GANADOR')
        elif player_02 >= FINAL:
            INICIO = player_02
            print('El jugador número 2 es el GANADOR')
        elif player_03 >= FINAL:
            INICIO = player_03
            print('El jugador número 3 es el GANADOR')
        elif player_04 >= FINAL:
            INICIO = player_04
            print('El jugador número 4 es el GANADOR')

    
    print('------------------FIN DEL JUEGO----------------------------')
    print('Game by JOHN ALEXANDER GUERRERO')
    


def selectlevel():
    view()
    print(''' Menú de Niveles:
        (1)-> Nivel Básico (Tablero de 20 posiciones)\n
        (2)-> Nivel Intermedio (Tablero de 30 posiciones)\n
        (3)-> Nivel Avanzado (Tablero de 50 posiciones)\n''')
    option=int(input("->: "))
    
    return option


# Parte incial del programa

players = cantidadPlayers()
nivel = selectlevel()
level(nivel, players)