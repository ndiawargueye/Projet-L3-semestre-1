public class Commande
{
    public int Id { get; set; }
    public DateTime DateCommande { get; set; }
    public string Etat { get; set; }
    public string TypeCommande { get; set; }
    public double Montant { get; set; }

    public int ClientId { get; set; }
    public int? BurgerId { get; set; }
    public int? MenuId { get; set; }
}
