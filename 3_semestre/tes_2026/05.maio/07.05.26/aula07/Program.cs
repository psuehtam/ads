using System;

class Program
{
    public static void Main(string[] args)
    {
        var builder = WebApplication.CreateBuilder(args);

        var app = builder.Build();

        app.UseHttpsRedirection();

        app.MapGet("/", () => "API funcionando!");

        var produtos = new List<Produto>();
        app.MapPost("/produtos", (Produto p) =>
        {
            produtos.Add(p);
            return "Produto adicionado!";
        });
        app.MapGet("/produtos", () => produtos);
        app.MapGet("/produtoCaro", () => 
        {
            Produto produtoMaisCaro = produtos[0];

            foreach (Produto produtoAtual in produtos)
            {
                if (produtoAtual.Preco > produtoMaisCaro.Preco)
                {
                    produtoMaisCaro = produtoAtual;
                }
            }

            return produtoMaisCaro;
        });

        app.Run();
    }
}

class Produto
{
    public string Nome { get; set; }
    public double Preco { get; set; }
}