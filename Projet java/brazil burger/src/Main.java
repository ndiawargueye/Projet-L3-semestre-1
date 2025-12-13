package view;

import entity.*;
import java.util.Scanner;
import service.*;

public class Main {

    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        BurgerService burgerService = new BurgerService();
        MenuService menuService = new MenuService();
        ComplementService complementService = new ComplementService();
        CommandeService commandeService = new CommandeService();

        int choix;
        do {
            System.out.println("\n--- BRASIL BURGER ---");
            System.out.println("1. Lister Burgers");
            System.out.println("2. Lister Menus");
            System.out.println("3. Commander");
            System.out.println("4. Lister Commandes");
            System.out.println("5. Quitter");
            choix = sc.nextInt();

            if (choix == 1) {
                burgerService.lister();
            }
            if (choix == 2) {
                menuService.lister();
            }

            if (choix == 3) {
                sc.nextLine();
                System.out.print("Nom: ");
                String nom = sc.nextLine();
                System.out.print("Prenom: ");
                String prenom = sc.nextLine();
                System.out.print("Telephone: ");
                String tel = sc.nextLine();

                Client client = new Client(nom, prenom, tel);

                System.out.println("1. Burger  2. Menu");
                int type = sc.nextInt();
                double total = 0;

                if (type == 1) {
                    burgerService.lister();
                    System.out.print("ID Burger: ");
                    total = burgerService.getById(sc.nextInt()).getPrix();
                } else {
                    menuService.lister();
                    System.out.print("ID Menu: ");
                    total = menuService.getById(sc.nextInt()).getPrix();
                }

                System.out.println("Ajouter complement ? 1.Oui 2.Non");
                if (sc.nextInt() == 1) {
                    complementService.lister();
                    total += 1000;
                }

                System.out.println("Paiement: 1.Wave 2.OM");
                sc.nextInt();

                commandeService.ajouter(client, total);
                System.out.println("Commande validée !");
            }

            if (choix == 4) {
                commandeService.lister();
            }

        } while (choix != 5);
    }
}
