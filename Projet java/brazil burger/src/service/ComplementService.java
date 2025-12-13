package service;

import entity.Complement;
import java.util.ArrayList;

public class ComplementService {

    private ArrayList<Complement> complements = new ArrayList<>();

    public ComplementService() {
        complements.add(new Complement(1, "Frites", 1000));
        complements.add(new Complement(2, "Boisson", 800));
    }

    public void lister() {
        for (Complement c : complements) {
            System.out.println(c);
        }
    }

    public Complement getById(int id) {
        for (Complement c : complements) {
            if (id == id) {
                return c;
            }
        }
        return null;
    }
}
