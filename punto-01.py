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
    
    INICIO = 1

    if y == 1:
        FINAL = 20
        while INICIO <= FINAL:
            for i in range(x):
                view()
                print("Total de jugadores : ",x)
                print(A)
                key = input("Pulsa tecla ENTER para continuar ...")
                posicion = random.randrange(1,6)
                print("player-0",(i+1),"posicion ",posicion)
                
                key = input("Pulsa tecla ENTER para continuar ...")
            


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