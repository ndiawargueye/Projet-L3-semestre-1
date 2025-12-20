using Microsoft.AspNetCore.Mvc;

public class CommandeController : Controller
{
    private readonly ApplicationDbContext db;

    public CommandeController(ApplicationDbContext context)
    {
        db = context;
    }

    [HttpPost]
    public IActionResult CommanderBurger(int burgerId, string typeCommande)
    {
        int clientId = HttpContext.Session.GetInt32("clientId").Value;
        var burger = db.Burgers.Find(burgerId);

        var commande = new Commande
        {
            DateCommande = DateTime.Now,
            Etat = "En cours",
            TypeCommande = typeCommande,
            Montant = burger.Prix,
            ClientId = clientId,
            BurgerId = burgerId
        };

        db.Commandes.Add(commande);
        db.SaveChanges();

        return RedirectToAction("Paiement", "Paiement", new { id = commande.Id });
    }
}
