
int idade = 25;
double altura = 1.75;
string nome = "Maria";
bool ativo = true;


Console.WriteLine("Idade:" + idade);
Console.WriteLine("Altura:" + altura);
Console.WriteLine("Nome:" + nome);
Console.WriteLine("Ativo:" + ativo);
 
Console.WriteLine($"\nIdade={idade}, Altura={altura}, Nome={nome}, Ativo={ativo}");




Console.Write("Digite seu nome: ");
string seuNome = Console.ReadLine()!;

Console.Write("Digite sua idade: ");
int suaIdade = int.Parse(Console.ReadLine()!);

Console.Write("Digite sua altura: ");
double suaAltura = double.Parse(Console.ReadLine()!);

Console.Write("Esta ativo?(0 ou 1): ");
int ativo2 = int.Parse(Console.ReadLine()!);
bool estaAtivo = ativo2 == 1;

Console.WriteLine($"Seu nome: {seuNome}");
Console.WriteLine($"Sua idade: {suaIdade}");
Console.WriteLine($"Sua altura: {suaAltura}");
Console.WriteLine($"Ativo?: {estaAtivo}");