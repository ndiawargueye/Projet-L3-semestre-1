using Microsoft.AspNetCore.Mvc;

public class AuthController : Controller
{
    private readonly ApplicationDbContext db;

    public AuthController(ApplicationDbContext context)
    {
        db = context;
    }

    public IActionResult Login() => View();

    [HttpPost]
    public IActionResult Login(string email, string motDePasse)
    {
        var client = db.Clients
            .FirstOrDefault(c => c.Email == email && c.MotDePasse == motDePasse);

        if (client != null)
        {
            HttpContext.Session.SetInt32("clientId", client.Id);
            return RedirectToAction("Catalogue", "Client");
        }

        ViewBag.Error = "Identifiants incorrects";
        return View();
    }

    public IActionResult Logout()
    {
        HttpContext.Session.Clear();
        return RedirectToAction("Login");
    }
}
