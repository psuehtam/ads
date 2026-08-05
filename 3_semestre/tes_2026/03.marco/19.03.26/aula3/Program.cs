using System;

public class Produto
{
    public string nome;
    public double preco;
    public void Exibir()
    {
        Console.WriteLine($"Produto: {nome} , Preco R$ {preco:F2}");
    }
    public void Atualizar(double novoPreco)
    {
        preco = novoPreco;
    }
}
class Program
{
    static void Main()
    {

        Produto p1 = new Produto();
        p1.nome = "Notebook";
        p1.preco = 3500;

        Produto p2 = new Produto();
        p2.nome = "celular";
        p2.preco = 2000;

        p1.Exibir();
        p2.Exibir();

        Console.WriteLine("Digite o preço do Produto 1");
        p1.Atualizar(double.Parse(Console.ReadLine()));

        p1.Exibir();
        p2.Exibir();


    }
}