package service;

import entity.*;
import java.util.ArrayList;

public class CommandeService {

    private ArrayList<Commande> commandes = new ArrayList<>();
    private int id = 1;

    public void ajouter(Client client, double total) {
        commandes.add(new Commande(id++, client, total));
    }

    public void lister() {
        for (Commande c : commandes) {
            System.out.println(c);
        }
    }
}
