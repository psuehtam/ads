using System;

public class Carro
{
    public string fabricante = "";
    public string modelo = "";
    public string cor = "";
    public double aro = 0;
    public int ano = 0;
    public bool ligado = false;

    public void exibir()
    {
        Console.WriteLine($"Carro: {modelo}, Fabricante: {fabricante}, Cor: {cor}, Aro: {aro}, Ano: {ano}");
    }
}

public class Livro
{
    public string titulo = "";
    public int ano = 0;
    public bool disponivel = false;

    public void exibir()
    {
        Console.WriteLine($"Titulo: {titulo}, Ano: {ano}, Disponivel: {disponivel}");
    }

    public void emprestar()
    {
        if (disponivel == false)
        {
            Console.WriteLine("Nao da pra devolver");
        } else
        {
            Console.WriteLine("Emrpestado");
        }
    }
}

public class Program
{
    public static void Main()
    {
        Carro c1 = new Carro();
        c1.fabricante = "Volkswagen";
        c1.modelo = "Gol";
        c1.cor = "Vermelho";
        c1.aro = 15;
        c1.ano = 2011;
        c1.exibir();

        Carro c2 = new Carro();
        c2.fabricante = "FIAT";
        c2.modelo = "Palio";
        c2.cor = "Prata";
        c2.aro = 15;
        c2.ano = 2012;
        c2.exibir();

        Livro l1 = new Livro();
        l1.titulo = "Meu primeiro livro";
        l1.ano = 2021;
        l1.disponivel = true;
        l1.exibir();
        l1.disponivel();
    }
}