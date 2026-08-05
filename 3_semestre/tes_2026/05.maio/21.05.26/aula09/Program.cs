using aula09.Data;
using aula09.Models;
using Microsoft.EntityFrameworkCore;
var builder = WebApplication.CreateBuilder(args);

builder.Services.AddDbContext<AppDataContext>(options => options.UseSqlite("Data Source=produtos.db"));
var app = builder.Build();

app.MapGet("/produtos", (AppDataContext context) =>
{
    return context.Produtos.ToList();
});


app.MapGet("/produtos/{id}", (int id, AppDataContext context) =>
{
    Produto produto = context.Produtos.Find(id);
    if (produto == null)
    {
        return Results.NotFound();
    }
    return Results.Ok(produto);
});


app.MapPost("/produtos", (Produto produto, AppDataContext
context) =>
{
    context.Produtos.Add(produto);
    context.SaveChanges();
    return Results.Created("$ /produtos/{produto.Id}", produto);
});


app.MapDelete("/produtos/{id}", (int id, AppDataContext
context) =>
{
    Produto produto = context.Produtos.Find(id);
    if (produto == null)
    {
        return Results.NotFound();
    }
    context.Produtos.Remove(produto);
    context.SaveChanges();
    return Results.Ok("Produto removido");
});


app.Run();