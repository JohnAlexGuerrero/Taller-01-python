import os

os.system('cls')
posiciones = int(input('Número de casillas para conformar el vector: '))
ultimo = int(posiciones - 2)
antepenultimo = posiciones - 3

vector = []

for recorre in range(posiciones):
    numero = int(input("Ingresa un valor: "))

    if recorre < (posiciones-1):
        vector.append(numero)
    else:
        while (vector[ultimo]+vector[antepenultimo]) == numero:
            print('El número es igual a la suma de la posicion ultima y antepenultima: ', numero)
            numero = int(input("Ingresa un valor: "))
        
        vector.append(numero)
        

        

print('\n')
print('Los Datos registrados en el vector son: ')

for recorre in vector:
    print('-> ',recorre)