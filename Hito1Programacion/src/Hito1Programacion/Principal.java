package Hito1Programacion;

import java.util.HashMap;

public class Principal {
    public static void main(String[] args) {
        HashMap<Integer, Animal> animales = new HashMap<>(); // Indicamos el tipo de dato que va en el hashmap

        // Alta de animales
        Perro perro = new Perro(1, "Danko", 14, "golden retriever", true, "Mediano"); // Creamos el objero perro donde pondremos los valores correspondientes
        Gato gato = new Gato(2, "Chispi", 5, "Gato siamés", false, true); // Creamos el objero gato donde pondremos los valores correspondientes

        altaAnimal(animales, perro); // Añadir perro a Hashmap
        altaAnimal(animales, gato); // Añadir gato a Hashmap

        // Intento de alta con chip repetido
        Perro perroDuplicado = new Perro(01, "Danko", 14, "golden retriever", true, "Mediano"); // volvemos a crear el mismo perro para que nos de error al intentar crear otro con el mismo chip
        altaAnimal(animales, perroDuplicado); // No se añade porque ya hay uno con ese chip

        // Búsqueda de animales
        buscarAnimal(animales, 3); // Va a buscar un animal que si existe (Que esta dado de alta)
        buscarAnimal(animales, 2); // Va a buscar un animal pero como no hay ninguno con ese 
    }

    public static void altaAnimal(HashMap<Integer, Animal> animales, Animal animal) { // Define el metodo y sus parametros
        if (animales.containsKey(animal.numeroDeChip)) { // Esta viendo si existe el numero del chip en el Hashmap
            System.out.println("Ya hay un animal con el chip: " + animal.numeroDeChip); // imprime que ya existe un animal con el chip 
        } else {
            animales.put(animal.numeroDeChip, animal); // 
            System.out.println("Animal dado de alta: " + animal.numeroDeChip); // Nos mostrara por consola que animal se ha dado de alta mediante el chip
        }
    }

    public static void buscarAnimal(HashMap<Integer, Animal> animales, int numeroDeChip) { // Define el metodo y sus parametros
        if (animales.containsKey(numeroDeChip)) { // Esta viendo si existe el numero del chip en el Hashmap
            animales.get(numeroDeChip).mostrar(); // Ejecutar metodo mostrar
        } else {
            System.out.println("No hay ningún animal con el chip: " + numeroDeChip); // Buscara un animal mediante el chip
        }
    }
}

