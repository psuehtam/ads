using System;
using System.Globalization;

class Program
{
    static void Main()
    {
        Console.WriteLine("Escolha um exercicio:");
        Console.WriteLine("1 - If Else Idade");
        Console.WriteLine("2 - Switch Case");
        Console.WriteLine("3 - Numero double");
        Console.WriteLine("4 - Menu");
        Console.WriteLine("5 - For");
        Console.WriteLine("6 - Tabuada");
        Console.WriteLine("7 - Numero Elevado");
        Console.WriteLine("8 - Par e Impar");



        int escolha = int.Parse(Console.ReadLine()!);

        switch (escolha)
        {
            case 1:
                Console.WriteLine("Digite sua Idade:");
                int idade = int.Parse(Console.ReadLine()!);

                if (idade < 10)
                    Console.WriteLine($"Voce eh criança, tem {idade} anos");
                else if (idade <= 18)
                    Console.WriteLine($"Voce eh adolescente, tem {idade} anos");
                else if (idade <= 59)
                    Console.WriteLine($"Voce eh adulto, tem {idade} anos");
                else
                    Console.WriteLine("Voce eh velho");

                break;

            case 2:
                Console.WriteLine("Um numero de 1 a 3:");
                int numero = int.Parse(Console.ReadLine()!);

                switch (numero)
                {
                    case 1:
                    case 2:
                    case 3:
                        Console.WriteLine($"Voce escolheu a opcao {numero}");
                        break;

                    default:
                        Console.WriteLine("Voce escolheu uma opcao invalida");
                        break;
                }

                break;

            case 3:
                Console.WriteLine("Digite um numero:");
                double numeroDouble = double.Parse(Console.ReadLine()!);

                if (numeroDouble < 100)
                    Console.WriteLine("Numero menor que 100");
                else
                    Console.WriteLine("Numero maior que 100");

                break;

            case 4:
                Console.WriteLine("Escolha uma opcao do menu:");
                Console.WriteLine("a - Cafe");
                Console.WriteLine("b - Cha");
                Console.WriteLine("c - Refrigerante");

                char opcaoMenu = char.Parse(Console.ReadLine()!);

                switch (opcaoMenu)
                {
                    case 'a':
                        Console.WriteLine("Voce escolheu Cafe");
                        break;

                    case 'b':
                        Console.WriteLine("Voce escolheu Cha");
                        break;

                    case 'c':
                        Console.WriteLine("Voce escolheu Refrigerante");
                        break;

                    default:
                        Console.WriteLine("Opcao invalida");
                        break;
                }

                break;

            case 5:
                for (int contador = 0; contador < 10; contador += 2)
                {
                    Console.WriteLine($"{contador}");
                }

                break;

            case 6:

                Console.WriteLine("Digite o numero da tabuada");
                int tabuada = int.Parse(Console.ReadLine()!);

                if (tabuada <= 10)
                {
                    for (int numTabuada = 1; numTabuada <= 10; numTabuada++)
                    {
                        Console.WriteLine($"{numTabuada} x {tabuada} = {numTabuada * tabuada}");
                    }
                }
                else
                {

                    Console.WriteLine("numero precisa ser menor que 10");
                }

                break;

            case 7:

                Console.WriteLine("Digite o numero elevado a 2");
                double expo = double.Parse(Console.ReadLine()!);

                double resultado = 1;


                for (int i = 0; i < expo; i++)
                {
                    resultado *= 2;
                }
                Console.WriteLine($"{resultado}");
                break;

                case 8:

                int number = 1;

                while (number != 0 )
                {
                    Console.WriteLine("Digite um numero");
                number = int.Parse(Console.ReadLine()!);

                if (number % 2 == 0)
                {
                    Console.WriteLine($"{number} eh par");
                } else
                    {
                        Console.WriteLine($"{number} eh impar");
                    }
                }
                break;

            default:
                Console.WriteLine("Opcao invalida");
                break;
        }
    }
}