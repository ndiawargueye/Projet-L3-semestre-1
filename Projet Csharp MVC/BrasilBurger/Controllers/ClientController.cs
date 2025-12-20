using Microsoft.AspNetCore.Mvc;

public class ClientController : Controller
{
    private readonly ApplicationDbContext db;

    public ClientController(ApplicationDbContext context)
    {
        db = context;
    }

    public IActionResult Catalogue(string type)
    {
        if (type == "burger")
            return View(db.Burgers.Where(b => !b.Archive).ToList());

        if (type == "menu")
            return View(db.Menus.ToList());

        return View();
    }

    public IActionResult Suivi()
    {
        int clientId = HttpContext.Session.GetInt32("clientId").Value;

        var commandes = db.Commandes
            .Where(c => c.ClientId == clientId)
            .ToList();

        return View(commandes);
    }
}
