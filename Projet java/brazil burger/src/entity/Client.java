package entity;

public class Client {

    private String nom;
    private String prenom;
    private String telephone;

    public Client(String nom, String prenom, String telephone) {
        this.nom = nom;
        this.prenom = prenom;
        this.telephone = telephone;
    }

    @Override
    public String toString() {
        return nom + " " + prenom + " (" + telephone + ")";
    }
}
