package Hito1Programacion;
import java.util.HashMap;
import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        HashMap<Integer, Animal> animales = new HashMap<>();
        HashMap<Integer, Adopcion> adopciones = new HashMap<>();
        Scanner scanner = new Scanner(System.in);
        boolean salirDelBucle = false;

        while (!salirDelBucle) { //Creamos el menu
            System.out.println("\n-- Menú Principal --");
            System.out.println("1. Dar de alta un nuevo animal");
            System.out.println("2. Listar todos los animales");
            System.out.println("3. Buscar un animal por número de chip");
            System.out.println("4. Realizar adopción");
            System.out.println("5. Dar de baja un animal");
            System.out.println("6. Mostrar estadísticas de gatos");
            System.out.println("7. Salir");
            System.out.print("Elige una opción: ");
            int opcion = scanner.nextInt(); // Pedimos la opcion al usuario
            scanner.nextLine(); 
            switch (opcion){ // Creamos un switch el cual usara la opcion dada por el usuario para hacer una cosa u otra
                case 1: // Dar de alta animal
                    System.out.print("¿Que animal quieres añadir perro o gato?: ");
                    String tipo = scanner.nextLine().toLowerCase();
                    System.out.print("Numero de chip: ");
                    int numeroDeChip = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Nombre: ");
                    String nombre = scanner.nextLine();
                    System.out.print("Edad: ");
                    int edad = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Raza: ");
                    String raza = scanner.nextLine();
                    System.out.print("¿Está adoptado true o false?: ");
                    boolean adoptado = scanner.nextBoolean();
                    scanner.nextLine();
                    if (tipo.equals("perro")) {
                        System.out.print("Tamaño: Pequeño - Mediano - Grande: ");
                        String tamaño = scanner.nextLine();
                        Perro perro = new Perro(numeroDeChip, nombre, edad, raza, adoptado, tamaño); //instanciamos perro
                        altaAnimal(animales, perro);
                    } else if (tipo.equals("gato")) {
                        System.out.print("¿Test de leucemia positivo true o false?: ");
                        boolean testLeucemia = scanner.nextBoolean();
                        scanner.nextLine();
                        Gato gato = new Gato(numeroDeChip, nombre, edad, raza, adoptado, testLeucemia); //instanciamos gato
                        altaAnimal(animales, gato);
                    } else {
                        System.out.println("El tipo de animal introducido no es valido");
                    }
                    break;
                case 2: //Listar animales
                    if (animales.isEmpty()) { // es para ver si el hasmap estana vacio
                        System.out.println("No hay animales registrados");
                    } else {
                        System.out.println("Listado de animales:");
                        for (Animal animal : animales.values()) {
                            animal.mostrar();
                        }
                    }
                    break;
                case 3: // Buscar animales
                    System.out.print("Introduce el número de chip: ");
                    int chipDeBusqueda = scanner.nextInt();
                    scanner.nextLine();
                    buscarAnimal(animales, chipDeBusqueda);
                    break;
                case 4: // Realizar adopcion
                    System.out.print("Introduce el número de chip del animal a adoptar: ");
                    int chipDeAdopcion = scanner.nextInt();
                    scanner.nextLine();
                    
                    if (!animales.containsKey(chipDeAdopcion)) { //Para ver si existen el chip
                        System.out.println("No hay ningún animal con ese número de chip.");
                    } else {
                        Animal animal = animales.get(chipDeAdopcion); // Obtener el animal con el chip
                        if (animal.adoptado) { // Comprobar si el animal esta adoptado
                            System.out.println("Este animal ya ha sido adoptado.");
                        } else {
                            System.out.print("Nombre del adoptante: ");
                            String nombreDeLaPersonaQueAdopta = scanner.nextLine();
                            System.out.print("DNI del adoptante: ");
                            String dniDeLaPersonaQueAdopta = scanner.nextLine();
                            animal.adoptado = true;
                            Adopcion adopcion = new Adopcion(animal, nombreDeLaPersonaQueAdopta, dniDeLaPersonaQueAdopta);
                            adopciones.put(chipDeAdopcion, adopcion); //Añade los datos de adopcion a adopciones
                            System.out.println("Disfruta de tu nueva mascota " +  nombreDeLaPersonaQueAdopta + " con DNI" + dniDeLaPersonaQueAdopta );
                        }
                    }
                    break;
                case 5: //Dar de baja
                    System.out.print("Numeor del chip del animal que quieras dar de baja: ");
                    int Baja = scanner.nextInt();
                    scanner.nextLine();
                    if (!animales.containsKey(Baja)) { //Para ver si existen el chip
                        System.out.println("No hay ningun animal con ese chip.");
                    } else {
                        animales.remove(Baja);
                        if (adopciones.containsKey(Baja)) {
                            adopciones.remove(Baja);
                            System.out.println("Animal y adopción eliminados correctamente.");
                        } else {
                            System.out.println("Animal eliminado");
                        }
                    }
                    break;
                case 6: // Mostrar estadisticas de Gatos
                    int totalDeGatos = 0;
                    int gatosConLeucemia = 0;
                    for (Animal animal : animales.values()){ //Recorremos los valores del hasmap
                        if (animal instanceof Gato) { //Esto va a comprarbar si aniaml pertenece a la clase gato	
                            totalDeGatos++; //va a sumarle 1 al totalGatos
                            Gato gato = (Gato) animal;
                            if (gato.testLeucemia) {
                                gatosConLeucemia++;
                            }
                        }
                    }
                    System.out.println("Total de gatos: " + totalDeGatos);
                    System.out.println("Numero de gatos con test de leucemia positivo: " + gatosConLeucemia);
                    break;
                case 7: // Salir
                    System.out.println("Se esta cerrando el programa");
                    salirDelBucle = true; //Sale del buche
                    break;
                default:
                    System.out.println("Esa opcion no es valida tienes que poner un numero entre el 1 y el 7");
            }
        }
        scanner.close();
    }
    public static void altaAnimal(HashMap<Integer, Animal> animales, Animal animal){ // He creado un metodo estatico para que no haya neceisdad de intanciar un objero
        if (animales.containsKey(animal.numeroDeChip)){ //compara que existe el chip como clave en el hasmap
            System.out.println("Error: Ya existe un animal con ese chip prueba con otro"); // Obtiene el animal con ese numero de chip
        } else {
            animales.put(animal.numeroDeChip, animal); // añadimos el animal
            System.out.println("El animal ha sido dado de alta.");
        }
    }
    public static void buscarAnimal(HashMap<Integer, Animal> animales, int numeroDeChip) {
        if (animales.containsKey(numeroDeChip)){ //Buscamos al animal por el chip
            animales.get(numeroDeChip).mostrar();
        } else {
            System.out.println("No se ha encontrado ningun animal con el chip: " + numeroDeChip);
        }
    }
}

