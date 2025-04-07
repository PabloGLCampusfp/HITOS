package Hito1Programacion;

public class Perro extends Animal {
    String tamaño; // Aqui estamos definiendo la  variable y el tipo de la misma

    public Perro(int numeroDeChip, String nombre, int edad, String raza, boolean adoptado, String tamaño) { // Aqui usamos el Constructor
        super(numeroDeChip, nombre, edad, raza, adoptado); // Hereda todas las variables de Animal
        this.tamaño = tamaño;
    }

    @Override
    public void mostrar() {
        System.out.println("Perro:"); // Esto se mostrara por consola
        System.out.println("Chip: " + numeroDeChip); // Esto se mostrara por consola
        System.out.println("Nombre: " + nombre); // Esto se mostrara por consola
        System.out.println("Edad: " + edad); // Esto se mostrara por consola
        System.out.println("Raza: " + raza); // Esto se mostrara por consola
        System.out.println("Adoptado: " + (adoptado ? "Sí" : "No")); // Esto se mostrara por consola
        System.out.println("Tamaño: " + tamaño); // Esto se mostrara por consola
    }
}

