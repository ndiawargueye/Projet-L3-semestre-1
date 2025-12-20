using Microsoft.AspNetCore.Mvc;

public class GestionnaireController : Controller
{
    private readonly ApplicationDbContext db;

    public GestionnaireController(ApplicationDbContext context)
    {
        db = context;
    }

    public IActionResult Commandes()
    {
        return View(db.Commandes.ToList());
    }

    public IActionResult Terminer(int id)
    {
        var commande = db.Commandes.Find(id);
        commande.Etat = "Terminée";
        db.SaveChanges();
        return RedirectToAction("Commandes");
    }

    public IActionResult Statistiques()
    {
        DateTime today = DateTime.Today;

        ViewBag.EnCours = db.Commandes.Count(c => c.Etat == "En cours" && c.DateCommande.Date == today);
        ViewBag.Validees = db.Commandes.Count(c => c.Etat == "Validée" && c.DateCommande.Date == today);
        ViewBag.Annulees = db.Commandes.Count(c => c.Etat == "Annulée" && c.DateCommande.Date == today);
        ViewBag.Recettes = db.Paiements
            .Where(p => p.DatePaiement.Date == today)
            .Sum(p => (double?)p.Montant) ?? 0;

        return View();
    }
}
