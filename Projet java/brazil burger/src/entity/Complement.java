package entity;

public class Complement {

    private int id;
    private String nom;
    private double prix;

    public Complement(int id, String nom, double prix) {
        this.id = id;
        this.nom = nom;
        this.prix = prix;
    }

    public double getPrix() {
        return prix;
    }

    @Override
    public String toString() {
        return id + " - " + nom + " | " + prix + " FCFA";
    }
}
