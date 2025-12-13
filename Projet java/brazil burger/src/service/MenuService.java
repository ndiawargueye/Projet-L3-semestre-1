package service;

import entity.Menu;
import java.util.ArrayList;

public class MenuService {

    private ArrayList<Menu> menus = new ArrayList<>();

    public MenuService() {
        menus.add(new Menu(1, "Menu Simple", 4000));
        menus.add(new Menu(2, "Menu Maxi", 5000));
    }

    public void lister() {
        for (Menu m : menus) {
            System.out.println(m);
        }
    }

    public Menu getById(int id) {
        for (Menu m : menus) {
            if (m.getId() == id) {
                return m;
            }
        }
        return null;
    }
}
