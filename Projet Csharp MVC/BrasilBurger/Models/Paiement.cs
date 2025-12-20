public class Paiement
{
    public int Id { get; set; }
    public DateTime DatePaiement { get; set; }
    public double Montant { get; set; }
    public string Moyen { get; set; }
    public int CommandeId { get; set; }
}
