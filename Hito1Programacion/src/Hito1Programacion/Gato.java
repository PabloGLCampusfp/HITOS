package Hito1Programacion;

public class Gato extends Animal {
    boolean testLeucemia; // Aqui estamos definiendo la  variable y el tipo de la misma

    public Gato(int numeroDeChip, String nombre, int edad, String raza, boolean adoptado, boolean testLeucemia){ // // Aqui usamos el Constructor
        super(numeroDeChip, nombre, edad, raza, adoptado); // Hereda todas las variables de Animal
        this.testLeucemia = testLeucemia;
    }

    @Override
    public void mostrar() {
        System.out.println("Gato:"); // Esto se mostrara por consola
        System.out.println("Chip: " + numeroDeChip); // Esto se mostrara por consola
        System.out.println("Nombre: " + nombre); // Esto se mostrara por consola
        System.out.println("Edad: " + edad); // Esto se mostrara por consola
        System.out.println("Raza: " + raza); // Esto se mostrara por consola
        System.out.println("Adoptado: " + (adoptado ? "Sí" : "No")); // Esto se mostrara por consola
        System.out.println("TestLeucemia: " + (testLeucemia ? "Si" : "No")); // Esto se mostrara por consola
    }
}
