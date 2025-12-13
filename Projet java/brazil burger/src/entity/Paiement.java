package entity;

public class Paiement {

    private String mode;
    private double montant;

    public Paiement(String mode, double montant) {
        this.mode = mode;
        this.montant = montant;
    }

    @Override
    public String toString() {
        return "Paiement " + mode + " : " + montant + " FCFA";
    }
}
