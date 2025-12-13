package entity;

public class Commande {

    private int id;
    private Client client;
    private double total;
    private String etat;

    public Commande(int id, Client client, double total) {
        this.id = id;
        this.client = client;
        this.total = total;
        this.etat = "VALIDEE";
    }

    @Override
    public String toString() {
        return "Commande #" + id + " | " + client + " | Total: " + total + " FCFA | " + etat;
    }
}
