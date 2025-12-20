using Microsoft.EntityFrameworkCore;

public class ApplicationDbContext : DbContext
{
    public ApplicationDbContext(DbContextOptions options) : base(options) { }

    public DbSet<Client> Clients { get; set; }
    public DbSet<Burger> Burgers { get; set; }
    public DbSet<Menu> Menus { get; set; }
    public DbSet<Complement> Complements { get; set; }
    public DbSet<Commande> Commandes { get; set; }
    public DbSet<Paiement> Paiements { get; set; }
}
