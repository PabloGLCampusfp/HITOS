package Hito1Programacion;

public abstract class Animal {
    int numeroDeChip; // Aqui estamos definiendo la  variable y el tipo de la misma
    String nombre; // Aqui estamos definiendo la  variable y el tipo de la misma
    int edad; // Aqui estamos definiendo la  variable y el tipo de la misma
    String raza; // Aqui estamos definiendo la  variable y el tipo de la misma
    boolean adoptado; // Aqui estamos definiendo la  variable y el tipo de la misma

    public Animal(int numeroDeChip, String nombre, int edad, String raza, boolean adoptado) {
        this.numeroDeChip = numeroDeChip; // Indicamos que las variables definidas anteriormente son igual a la informacion que nos de el usuario por escrito
        this.nombre = nombre; // Indicamos que las variables definidas anteriormente son igual a la informacion que nos de el usuario por escrito
        this.edad = edad; // Indicamos que las variables definidas anteriormente son igual a la informacion que nos de el usuario por escrito
        this.raza = raza; // Indicamos que las variables definidas anteriormente son igual a la informacion que nos de el usuario por escrito
        this.adoptado = adoptado; // Indicamos que las variables definidas anteriormente son igual a la informacion que nos de el usuario por escrito
    }


    public abstract void mostrar(); //Creamos el metodo mostrar
}

