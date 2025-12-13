package service;

import entity.Burger;
import java.util.ArrayList;

public class BurgerService {

    private ArrayList<Burger> burgers = new ArrayList<>();

    public BurgerService() {
        burgers.add(new Burger(1, "Cheese Burger", 2500));
        burgers.add(new Burger(2, "Chicken Burger", 3000));
    }

    public void lister() {
        for (Burger b : burgers) {
            System.out.println(b);
        }
    }

    public Burger getById(int id) {
        for (Burger b : burgers) {
            if (b.getId() == id) {
                return b;
            }
        }
        return null;
    }
}
