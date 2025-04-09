package Hito1Programacion;

public class Adopcion {
    Animal animal; //Creamos las variables
    String nombreDeLaPersonaQueAdopta;
    String dniDeLaPersonaQueAdopta;

    public Adopcion(Animal animal, String nombreDeLaPersonaQueAdopta, String dniDeLaPersonaQueAdopta) {
        this.animal = animal;
        this.nombreDeLaPersonaQueAdopta = nombreDeLaPersonaQueAdopta; //// Indicamos que las variables definidas anteriormente son igual a la informacion que nos de el usuario por escrito
        this.dniDeLaPersonaQueAdopta = dniDeLaPersonaQueAdopta;
    }
}

