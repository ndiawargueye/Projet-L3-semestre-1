using Microsoft.AspNetCore.Mvc;

public class PaiementController : Controller
{
    private readonly ApplicationDbContext db;

    public PaiementController(ApplicationDbContext context)
    {
        db = context;
    }

    public IActionResult Paiement(int id)
    {
        var commande = db.Commandes.Find(id);
        return View(commande);
    }

    [HttpPost]
    public IActionResult Valider(int commandeId, string moyen)
    {
        var commande = db.Commandes.Find(commandeId);

        var paiement = new Paiement
        {
            DatePaiement = DateTime.Now,
            Montant = commande.Montant,
            Moyen = moyen,
            CommandeId = commandeId
        };

        commande.Etat = "Validée";

        db.Paiements.Add(paiement);
        db.SaveChanges();

        return RedirectToAction("Suivi", "Client");
    }
}
