
/*document.addEventListener("DOMContentLoaded", function () {
const leagues =[
    {
        name:"Premier League",
        tableId: 'eplBtts',
        teams: [
            { team: "Liverpool", MP: 38, MW: 25, MD: 9, GF: 86, GA: 41 },
    { team: "Arsenal", MP: 38, MW: 20, MD: 14, GF: 69, GA: 34 },
    { team: "Manchester City", MP: 38, MW: 21, MD: 8, GF: 72, GA: 44 },
    { team: "Chelsea", MP: 38, MW: 20, MD: 9, GF: 64, GA: 43 },
    { team: "Newcastle", MP: 38, MW: 20, MD: 6, GF: 68, GA: 47 },
    { team: "Aston Villa", MP: 38, MW: 19, MD: 9, GF: 58, GA: 51 },
    { team: "Brighton", MP: 38, MW: 16, MD: 13, GF: 66, GA: 59 },
    { team: "Nottingham", MP: 38, MW: 19, MD: 8, GF: 58, GA: 46 },
    { team: "Bournemouth", MP: 38, MW: 15, MD: 11, GF: 58, GA: 46 },
    { team: "Brentford", MP: 38, MW: 16, MD: 8, GF: 66, GA: 57 },
    { team: "Fulham", MP: 38, MW: 15, MD: 9, GF: 54, GA: 54 },
    { team: "Crystal Palace", MP: 38, MW: 13, MD: 14, GF: 51, GA: 51 },
    { team: "Everton", MP: 38, MW: 11, MD: 5, GF: 42, GA: 44 },
    { team: "West Ham", MP: 38, MW: 11, MD: 10, GF: 46, GA: 62 },
    { team: "Manchester United", MP: 38, MW: 11, MD: 9, GF: 44, GA: 54 },
    { team: "Wolves", MP: 38, MW: 12, MD: 6, GF: 54, GA: 69 },
    { team: "Tottenham", MP: 38, MW: 11, MD: 5, GF: 64, GA: 65 },
    { team: "Leicester", MP: 38, MW: 6, MD: 7, GF: 33, GA: 80 },
    { team: "Ipswich", MP: 38, MW: 4, MD: 10, GF: 36, GA: 82 },
    { team: "Southampton", MP: 38, MW: 2, MD: 6, GF: 26, GA: 86 },
        ],
        matches: [
            ["Liverpool", "Bournemouth"],
    ["Aston Villa", "Newcastle"],
	["Brighton", "Fulham"],
	["Sunderland", "West Ham"],
	["Tottenham", "Burnley"],
	["Wolves", "Manchester City"],
	["Chelsea", "Crystal Palace"],
	["Nottingham", "Brentford"],
	["Manchester United", "Arsenal"],
	["Leeds", "Everton"]
  ]
        
    },

    {
        name:"Spanish La Liga",
        tableId: 'laligaBtts',
        teams: [
            { team: "Barcelona", MP: 38, MW: 28, MD: 4, GF: 102, GA: 39 },
    { team: "Real Madrid", MP: 38, MW: 26, MD: 6, GF: 78, GA: 38 },
    { team: "Atletico Madrid", MP: 38, MW: 22, MD: 10, GF:65, GA: 30 },
	{ team: "Athletic Club", MP: 38, MW: 19, MD: 13, GF: 54, GA: 29 },
    { team: "Villarreal", MP: 38, MW: 20, MD: 10, GF: 71, GA: 51 },
    { team: "Real Betis", MP: 38, MW: 16, MD: 12, GF: 57, GA: 50 },
    { team: "Celta Vigo", MP: 38, MW: 16, MD: 7, GF: 59, GA: 57 },
    { team: "Rayo Vallecano", MP: 38, MW: 13, MD: 13, GF: 41, GA: 45 },
    { team: "Osasuna", MP: 38, MW: 12, MD: 16, GF: 48, GA: 52 },
	{ team: "Mallorca", MP: 38, MW: 13, MD: 9, GF: 45, GA: 44 },
	{ team: "Real Sociedad", MP: 38, MW: 13, MD: 7, GF: 35, GA: 46 },
	{ team: "Valencia", MP: 38, MW: 11, MD: 13, GF: 44, GA: 54 },
	{ team: "Getafe", MP: 38, MW: 11, MD: 9, GF: 34, GA: 39 },
	{ team: "Espanyol", MP: 38, MW: 11, MD: 9, GF: 40, GA: 51 },
	{ team: "Alaves", MP: 38, MW: 10, MD: 12, GF: 38, GA: 48 },
	{ team: "Girona", MP: 38, MW: 11, MD: 8, GF: 44, GA: 60 },
	{ team: "Sevilla", MP: 38, MW: 10, MD: 11, GF: 42, GA: 55 },
	{ team: "Leganes", MP: 38, MW: 9, MD: 13, GF: 39, GA: 56 },
	{ team: "Las Palmas", MP: 38, MW: 8, MD: 8, GF: 40, GA: 61 },
	{ team: "Valladolid", MP: 38, MW: 4, MD: 4, GF: 26, GA: 90 },
        ],
        matches:[
            ["Girona", "Rayo Vallecano"],
    ["Villarreal", "Oviedo"],
    ["Mallorca", "Barcelona"],
	["Valencia", "Real Sociedad"],
	["Celta Vigo", "Getafe"],
	["Athletico Club", "Sevilla"],
	["Espanyol", "Atletico Madrid"],
	["Elche", "Real Betis"],
	["Real Madrid", "Osasuna"]
        ]
    },
    {
        name:"English Championship",
        tableId: 'eflBTTS',
        teams: [
           { team: "Leeds", MP: 46, MW: 29, MD: 13, GF: 95, GA: 30 },
    { team: "Burnley", MP: 46, MW: 28, MD: 16, GF: 69, GA: 16 },
    { team: "Sheffield United", MP: 46, MW: 28, MD: 8, GF: 63, GA: 36 },
    { team: "Sunderland", MP: 46, MW: 21, MD: 13, GF: 58, GA: 44 },
    { team: "Coventry", MP: 46, MW: 20, MD: 9, GF: 64, GA: 58 },
    { team: "Bristol City", MP: 46, MW: 17, MD: 17, GF: 59, GA: 55 },
    { team: "Blackburn", MP: 46, MW: 19, MD: 9, GF: 53, GA: 48 },
    { team: "Millwall", MP: 46, MW: 18, MD: 12, GF: 47, GA: 49 },
	{ team: "West Brom", MP: 46, MW: 15, MD: 19, GF: 57, GA: 47 },
	{ team: "Middlesbrough", MP: 46, MW: 18, MD: 10, GF: 64, GA: 56 },
	{ team: "Swansea", MP: 46, MW: 17, MD: 10, GF: 51, GA: 56 },
	{ team: "Sheffield Wednesday", MP: 46, MW: 15, MD: 13, GF: 60, GA: 69 },
	{ team: "Norwich", MP: 46, MW: 14, MD: 15, GF: 71, GA: 68 },
	{ team: "Watford", MP: 46, MW: 16, MD: 9, GF: 53, GA: 61 },
	{ team: "QPR", MP: 46, MW: 14, MD: 14, GF: 43, GA: 63 },
	{ team: "Portsmouth", MP: 46, MW: 14, MD: 12, GF: 58, GA: 71 },
	{ team: "Oxford", MP: 46, MW: 13, MD: 14, GF: 49, GA: 65 },
	{ team: "Stoke", MP: 46, MW: 12, MD: 15, GF: 45, GA: 62 },
	{ team: "Derby County", MP: 46, MW: 13, MD: 11, GF: 48, GA: 56 },
	{ team: "Preston", MP: 46, MW: 10, MD: 20, GF: 48, GA: 59 },
	{ team: "Hull", MP: 46, MW: 12, MD: 13, GF: 44, GA: 54 },
	{ team: "Luton", MP: 46, MW: 13, MD: 10, GF: 45, GA: 69 },
	{ team: "Plymouth", MP: 46, MW: 11, MD: 13, GF: 51, GA: 88 },
	{ team: "Cardiff", MP: 46, MW: 9, MD: 17, GF: 48, GA: 73 },
        ],
        matches:[
            ["Birmingham", "Ipswich"],
   ["Southampton", "Wrexham"],
    ["Coventry", "Hull"],
	//["Charlton", "Watford"],
	["West Brom", "Blackburn"],
	["Norwich", "Millwall"]
        ]
    },

    {
        name:"English League One",
        tableId: 'leagueOneBTTS',
        teams: [
          { team: "Birmingham", MP: 46, MW: 34, MD: 9, GF: 84, GA: 31 },
    { team: "Wrexham", MP: 46, MW: 27, MD: 11, GF: 67, GA: 34 },
    { team: "Stockport", MP: 46, MW: 25, MD: 12, GF: 72, GA: 42 },
    { team: "Charlton", MP: 46, MW: 25, MD: 10, GF: 67, GA: 43 },
    { team: "Wycombe", MP: 46, MW: 24, MD: 12, GF: 70, GA: 45 },
    { team: "Leyton Orient", MP: 46, MW: 24, MD: 6, GF: 72, GA: 48 },
    { team: "Reading", MP: 46, MW: 21, MD: 12, GF: 68, GA: 57 },
    { team: "Bolton", MP: 46, MW: 20, MD: 8, GF: 67, GA: 70 },
	{ team: "Blackpool", MP: 46, MW: 17, MD: 16, GF: 60, GA: 12 },
	{ team: "Huddersfield", MP: 46, MW: 19, MD: 7, GF: 58, GA: 55 },
	{ team: "Lincoln", MP: 46, MW: 16, MD: 13, GF: 64, GA: 56 },
	{ team: "Barnsley", MP: 46, MW: 17, MD: 10, GF: 69, GA: 73 },
	{ team: "Rotherham", MP: 46, MW: 16, MD: 11, GF: 54, GA: 59 },
	{ team: "Stevenage", MP: 46, MW: 15, MD: 12, GF: 42, GA: 50 },
	{ team: "Wigan", MP: 46, MW: 13, MD: 17, GF: 40, GA: 42 },
	{ team: "Exeter", MP: 46, MW: 15, MD: 11, GF: 49, GA: 65 },
	{ team: "Mansfield", MP: 46, MW: 15, MD: 9, GF: 60, GA: 73 },
	{ team: "Peterborough", MP: 46, MW: 13, MD: 12, GF: 68, GA: 81 },
	{ team: "Northampton", MP: 46, MW: 12, MD: 15, GF: 48, GA: 66 },
	{ team: "Burton", MP: 46, MW: 11, MD: 14, GF: 49, GA: 66 },
	{ team: "Crawley", MP: 46, MW: 12, MD: 10, GF: 57, GA: 83 },
	{ team: "Bristol Rovers", MP: 46, MW: 12, MD: 7, GF: 44, GA: 76 },
	{ team: "Cambridge", MP: 46, MW: 9, MD: 11, GF: 45, GA: 73 },
	{ team: "Shrewsbury", MP: 46, MW: 8, MD: 9, GF: 41, GA: 79 },
        ],
        matches:[
           ["Luton", "Wimbledon"],
   ["Cardiff", "Peterborough"],
    ["Blackpool", "Stevenage"],
	["Plymouth", "Barnsley"],
	["Rotherham", "Port Vale"],
	["Wigan", "Northampton"],
	["Bradford", "Wycombe"],
	["Burton", "Mansfield"],
	["Lincoln", "Reading"],
	["Donacaster", "Exeter"],
	["Huddersfield", "Leyton Orient"],
	["Stockport", "Bolton"]
        ]
    },

    {
        name:"English League Two",
        tableId: 'leagueTwoBTTS',
        teams: [
          { team: "Doncaster", MP: 46, MW: 24, MD: 12, GF: 50, GA: 23 },
    { team: "Port Vale", MP: 46, MW: 22, MD: 14, GF: 65, GA: 46 },
    { team: "Bradford", MP: 46, MW: 23, MD: 12, GF: 64, GA: 45 },
    { team: "Walsall", MP: 46, MW: 21, MD: 14, GF: 75, GA: 54 },
    { team: "Wimbledon", MP: 46, MW: 20, MD: 13, GF: 56, GA: 35 },
    { team: "Notts County", MP: 46, MW: 20, MD: 12, GF: 68, GA: 49 },
    { team: "Chesterfield", MP: 46, MW: 19, MD: 13, GF: 73, GA: 54 },
    { team: "Salford", MP: 46, MW: 18, MD: 15, GF: 64, GA: 54 },
	{ team: "Grimsby", MP: 46, MW: 17, MD: 16, GF: 60, GA: 12 },
	{ team: "Colchester", MP: 46, MW: 20, MD: 8, GF: 61, GA: 67 },
	{ team: "Bromley", MP: 46, MW: 17, MD: 15, GF: 54, GA: 59 },
	{ team: "Swindon", MP: 46, MW: 15, MD: 17, GF: 71, GA: 63 },
	{ team: "Crewe", MP: 46, MW: 16, MD: 11, GF: 54, GA: 59 },
	{ team: "Fleetwood", MP: 46, MW: 15, MD: 17, GF: 49, GA: 48 },
	{ team: "Cheltenham", MP: 46, MW: 15, MD: 12, GF: 40, GA: 70 },
	{ team: "Barrow", MP: 46, MW: 15, MD: 14, GF: 52, GA: 50 },
	{ team: "Gillingham", MP: 46, MW: 14, MD: 16, GF: 41, GA: 46 },
	{ team: "Harrogate", MP: 46, MW: 14, MD: 11, GF: 43, GA: 61 },
	{ team: "MK Dons", MP: 46, MW: 14, MD: 10, GF: 52, GA: 66 },
	{ team: "Tranmere", MP: 46, MW: 12, MD: 15, GF: 45, GA: 65 },
	{ team: "Accrington Stanley", MP: 46, MW: 12, MD: 14, GF: 53, GA: 69 },
	{ team: "Newport", MP: 46, MW: 13, MD: 10, GF: 52, GA: 76 },
	{ team: "Carlisle", MP: 46, MW: 10, MD: 12, GF: 44, GA: 71 },
	{ team: "Morecambe", MP: 46, MW: 10, MD: 6, GF: 40, GA: 72 },
        ],
        matches:[
          ["Colchester", "Tranmere"],
   ["Chesterfield", "Barrow"],
    ["Accrington Stanley", "Gillingham"],
	["Barnet", "Fleetwood"],
	["Walsall", "Swindon"],
	["Bristol Rovers", "Harrogate"],
	["Cambridge", "Cheltenham"],
	["Grimsby", "Crawley"],
	["Newport", "Notts County"],
	["Salford", "Crewe"],
	//["Shrewsbury", "Leyton Orient"],
	["Stockport", "Bromley"]
        ]
    },
    

    {
        name:"Spanish La Liga 2",
        tableId: 'laLiga2BTTS',
        teams: [
         { team: "Levante", MP: 42, MW: 22, MD: 13, GF: 69, GA: 42 },
    { team: "Elche", MP: 42, MW: 22, MD: 11, GF: 59, GA: 34 },
    { team: "Oviedo", MP: 42, MW: 21, MD: 12, GF:56, GA: 42 },
	{ team: "Mirandes", MP: 42, MW: 22, MD: 9, GF: 59, GA: 40 },
    { team: "Racing", MP: 42, MW: 20, MD: 11, GF: 65, GA: 51 },
    { team: "Almeria", MP: 42, MW: 19, MD: 12, GF: 72, GA: 55 },
    { team: "Granada", MP: 42, MW: 18, MD: 11, GF: 65, GA: 54 },
    { team: "Huesca", MP: 42, MW: 18, MD: 10, GF: 58, GA: 49 },
    { team: "Eibar", MP: 42, MW: 15, MD: 13, GF: 44, GA: 41 },
	{ team: "Albacete", MP: 42, MW: 15, MD: 13, GF: 57, GA: 57 },
	{ team: "Gijon", MP: 42, MW: 14, MD: 14, GF: 57, GA: 54 },
	{ team: "Burgos", MP: 42, MW: 15, MD: 10, GF: 41, GA: 48 },
	{ team: "Cadiz", MP: 42, MW: 14, MD: 13, GF: 55, GA: 53 },
	{ team: "Cordoba", MP: 42, MW: 14, MD: 13, GF: 59, GA: 63 },
	{ team: "Deportivo", MP: 42, MW: 13, MD: 14, GF: 56, GA: 54 },
	{ team: "Malaga", MP: 42, MW: 12, MD: 17, GF: 42, GA: 46 },
	{ team: "Castellon", MP: 42, MW: 14, MD: 11, GF: 65, GA: 63 },
	{ team: "Zaragoza", MP: 42, MW: 13, MD: 12, GF: 56, GA: 63 },
	{ team: "Eldense", MP: 42, MW: 11, MD: 12, GF: 44, GA: 63 },
	{ team: "Tenerife", MP: 42, MW: 8, MD: 12, GF: 35, GA: 55 },
	{ team: "Racing Ferrol", MP: 42, MW: 6, MD: 12, GF: 22, GA: 64 },
	{ team: "Cartagena", MP: 42, MW: 6, MD: 5, GF: 33, GA: 78 }
        ],
        matches:[
          ["Cadiz", "Mirandes"],
    ["Racing", "Castellon"],
    ["Granada", "Deportivo"],
	["Real Sociedad B", "Zaragoza"],
	["Valladolid", "Ceuta"],
	["Gijon", "Cordoba"],
	["Malaga", "Eibar"],
	["Burgos", "Cultural Leonesa"],
	["Huesca", "Leganes"],
	["Las Palmas", "Andorra"]
        ]
    },

    
    {
        name:"Italian Serie A",
        tableId: 'serieABTTS',
        teams: [
         { team: "Napoli", MP: 38, MW: 24, MD: 10, GF: 59, GA: 27 },
    { team: "Inter", MP: 38, MW: 24, MD: 9, GF: 79, GA: 35 },
    { team: "Atalanta", MP: 38, MW: 22, MD: 8, GF:78, GA: 38 },
	{ team: "Juventus", MP: 38, MW: 18, MD: 16, GF: 58, GA: 35 },
    { team: "Roma", MP: 38, MW: 20, MD: 9, GF: 56, GA: 35 },
    { team: "Fiorentina", MP: 38, MW: 19, MD: 8, GF: 60, GA: 41 },
    { team: "Lazio", MP: 38, MW: 18, MD: 11, GF: 61, GA: 49 },
    { team: "Milan", MP: 38, MW: 18, MD: 9, GF: 61, GA: 43 },
    { team: "Bologna", MP: 38, MW: 16, MD: 14, GF: 57, GA: 47 },
	{ team: "Como", MP: 38, MW: 13, MD: 10, GF: 49, GA: 52 },
	{ team: "Torino", MP: 38, MW: 10, MD: 14, GF: 39, GA: 45 },
	{ team: "Udinese", MP: 38, MW: 12, MD: 8, GF: 41, GA: 56 },
	{ team: "Genoa", MP: 38, MW: 10, MD: 13, GF: 49, GA: 12 },
	{ team: "Verona", MP: 38, MW: 10, MD: 7, GF: 34, GA: 66 },
	{ team: "Cagliari", MP: 38, MW: 9, MD: 9, GF: 40, GA: 56 },
	{ team: "Parma", MP: 38, MW: 7, MD: 15, GF: 44, GA: 58 },
	{ team: "Leece", MP: 38, MW: 8, MD: 10, GF: 27, GA: 58 },
	{ team: "Empoli", MP: 38, MW: 6, MD: 13, GF: 33, GA: 59 },
	{ team: "Venezia", MP: 38, MW: 5, MD: 14, GF: 32, GA: 56 },
	{ team: "Monza", MP: 38, MW: 3, MD: 9, GF: 28, GA: 69 },
        ],
        matches:[
          ["Genoa", "Leece"],
    ["Sassuolo", "Napoli"],
    ["Roma", "Bologna"],
	["Milan", "Cremonese"],
	["Cagliari", "Fiorentina"],
	["Como", "Lazio"],
	["Juventus", "Parma"],
	["Atalanta", "Pisa"],
	["Udinese", "Verona"],
	["Inter", "Torino"]
        ]
    },

    {
        name:"French Ligue One",
        tableId: 'frenchLigueOneBTTS',
        tableIdOver25: "frenchLigueOneOver25",
        teams: [
         { team: "PSG", MP: 34, MW: 26, MD: 6, GF: 92, GA: 35 },
    { team: "Marseille", MP: 34, MW: 20, MD: 5, GF: 74, GA: 47 },
    { team: "Monaco", MP: 34, MW: 18, MD: 7, GF:63, GA: 41 },
	{ team: "Nice", MP: 34, MW: 17, MD: 9, GF: 66, GA: 41 },
    { team: "Lille", MP: 34, MW: 17, MD: 9, GF: 52, GA: 36 },
    { team: "Lyon", MP: 34, MW: 17, MD: 6, GF: 65, GA: 46 },
    { team: "Strasbourg", MP: 34, MW: 16, MD: 9, GF: 56, GA: 44 },
    { team: "Lens", MP: 34, MW: 15, MD: 7, GF: 42, GA: 39 },
    { team: "Brest", MP: 34, MW: 15, MD: 5, GF: 52, GA: 59 },
	{ team: "Toulouse", MP: 34, MW: 11, MD: 9, GF: 44, GA: 43 },
	{ team: "Auxerre", MP: 34, MW: 11, MD: 9, GF: 48, GA: 51 },
	{ team: "Rennes", MP: 34, MW: 13, MD: 12, GF: 51, GA: 50 },
	{ team: "Nantes", MP: 34, MW: 8, MD: 12, GF: 48, GA: 51 },
	{ team: "Angers", MP: 34, MW: 10, MD: 6, GF: 32, GA: 53 },
	{ team: "Le Havre", MP: 34, MW: 10, MD: 4, GF: 40, GA: 71 },
	{ team: "Reims", MP: 34, MW: 8, MD: 9, GF: 33, GA: 47 },
	{ team: "St.Etienne", MP: 34, MW: 8, MD: 6, GF: 30, GA: 77 },
	{ team: "Montpellier", MP: 34, MW: 4, MD: 4, GF: 23, GA: 79 },
	
        ],
        matches:[
          ["Auxerre", "Lorient"],
    ["Rennes", "Marseille"],
    ["Angers", "Paris FC"],
	["Nice", "Toulouse"],
	["Monaco", "Le Havre"],
	["Brest", "Lille"],
	["Nantes", "PSG"],
	["Lens", "Lyon"],
	["Metz", "Strasbourg"]
        ]
    },

    {
        name:"French Ligue 2",
        tableId: 'frenchLeague2BTTS',
        teams: [
        { team: "Lorient", MP: 34, MW: 22, MD: 5, GF: 68, GA: 37 },
    { team: "Paris FC", MP: 34, MW: 21, MD: 6, GF: 55, GA: 33 },
    { team: "Metz", MP: 34, MW: 18, MD: 11, GF:64, GA: 34 },
	{ team: "Dunkerque", MP: 34, MW: 17, MD: 5, GF: 47, GA: 40 },
    { team: "Guingamp", MP: 34, MW: 17, MD: 4, GF: 57, GA: 45 },
    { team: "Annecy", MP: 34, MW: 14, MD: 9, GF: 42, GA: 43 },
    { team: "Laval", MP: 34, MW: 14, MD: 8, GF: 44, GA: 38 },
    { team: "Bastia", MP: 34, MW: 11, MD: 15, GF: 43, GA: 37 },
    { team: "Grenoble", MP: 34, MW: 13, MD: 7, GF: 43, GA: 44 },
	{ team: "Troyes", MP: 34, MW: 13, MD: 5, GF: 36, GA: 34 },
	{ team: "Amiens", MP: 34, MW: 13, MD: 4, GF: 38, GA: 50 },
	{ team: "Ajaccio", MP: 34, MW: 12, MD: 6, GF: 30, GA: 42 },
	{ team: "Pau", MP: 34, MW: 10, MD: 12, GF: 39, GA: 53 },
	{ team: "Rodez", MP: 34, MW: 9, MD: 12, GF: 56, GA: 54 },
	{ team: "Red Star", MP: 34, MW: 11, MD: 14, GF: 51, GA: 14 },
	{ team: "Clermont Foot", MP: 34, MW: 7, MD: 12, GF: 30, GA: 46 },
	{ team: "Martigues", MP: 34, MW: 9, MD: 5, GF: 29, GA: 56 },
	{ team: "Caen", MP: 34, MW: 5, MD: 7, GF: 31, GA: 58 },
	
        ],
        matches:[
          ["Guingamp", "Le Mans"],
    ["Pau", "Annecy"],
    ["Dunkerque", "Clermont Foot"],
	["Laval", "St. Etienne"],
	["Ajaccio", "Bastia"],
	["Rodez", "Nancy"],
	["Troyes", "Grenoble"],
	["Montpellier", "Red Star"],
	["Amiens", "Reims"]
        ]
    },

    {
        name:"German Bundesliga",
        tableId: 'germanBundesligaBTTS',
        teams: [
        { team: "Bayern", MP: 34, MW: 25, MD: 7, GF: 99, GA: 32 },
    { team: "Leverkusen", MP: 34, MW: 19, MD: 12, GF: 72, GA: 43 },
    { team: "Frankfurt", MP: 34, MW: 17, MD: 9, GF:46, GA: 22 },
	{ team: "Dortmund", MP: 34, MW: 17, MD: 6, GF: 71, GA: 51 },
    { team: "Freiburg", MP: 34, MW: 16, MD: 7, GF: 49, GA: 53 },
    { team: "Mainz", MP: 34, MW: 14, MD: 10, GF: 55, GA: 43 },
    { team: "Leipzig", MP: 34, MW: 13, MD: 12, GF: 53, GA: 48 },
    { team: "Werder", MP: 34, MW: 14, MD: 9, GF: 54, GA: 57 },
    { team: "Stuttgart", MP: 34, MW: 14, MD: 8, GF: 64, GA: 53 },
	{ team: "Monchengladbach", MP: 34, MW: 13, MD: 6, GF: 55, GA: 57 },
	{ team: "Wolfsburg", MP: 34, MW: 11, MD: 10, GF: 56, GA: 54 },
	{ team: "Augsburg", MP: 34, MW: 11, MD: 10, GF: 35, GA: 51 },
	{ team: "Union Berlin", MP: 34, MW: 10, MD: 10, GF: 35, GA: 51 },
	{ team: "St. Pauli", MP: 34, MW: 8, MD: 8, GF: 28, GA: 41 },
	{ team: "Hoffenheim", MP: 34, MW: 7, MD: 11, GF: 46, GA: 68 },
	{ team: "Heidenheim", MP: 34, MW: 8, MD: 5, GF: 37, GA: 64 },
	{ team: "Holstein Kiel", MP: 34, MW: 6, MD: 7, GF: 49, GA: 80 },
	{ team: "Bochum", MP: 34, MW: 6, MD: 7, GF: 33, GA: 67 },
	
        ],
        matches:[
          ["Bayern", "Leipzig"],
    ["Leverkusen", "Hoffenheim"],
    ["Union Berlin", "Stuttgart"],
	["Heidenheim", "Wolfsburg"],
	["Freiburg", "Augsburg"],
	["Frankfurt", "Werder"],
	["St. Pauli", "Dortmund"],
	["Mainz", "Koln"],
	["Monchengladbach", "Hamburger"]
	
        ]
    },

    {
        name:"German Bundesliga 2",
        tableId: 'germanBundesliga2BTTS',
        teams: [
       { team: "Koln", MP: 34, MW: 18, MD: 17, GF: 53, GA: 38 },
    { team: "Hamburger", MP: 34, MW: 16, MD: 11, GF: 78, GA: 44 },
    { team: "Elvesberg", MP: 34, MW: 16, MD: 10, GF:64, GA: 37 },
	{ team: "Paderborn", MP: 34, MW: 15, MD: 10, GF: 56, GA: 46 },
    { team: "Magdeburg", MP: 34, MW: 14, MD: 11, GF: 64, GA: 52 },
    { team: "Dusseldorf", MP: 34, MW: 14, MD: 11, GF: 57, GA: 52 },
    { team: "Kaiserslautern", MP: 34, MW: 15, MD: 18, GF: 56, GA: 55 },
    { team: "Karlsruher", MP: 34, MW: 14, MD: 10, GF: 57, GA: 55 },
    { team: "Hannover", MP: 34, MW: 13, MD: 12, GF: 41, GA: 36 },
	{ team: "Nurnberg", MP: 34, MW: 14, MD: 6, GF: 60, GA: 57 },
	{ team: "Hertha", MP: 34, MW: 12, MD: 8, GF: 49, GA: 51 },
	{ team: "Darmstadt", MP: 34, MW: 11, MD: 9, GF: 56, GA: 55 },
	{ team: "Greuther Furth", MP: 34, MW: 10, MD: 19, GF: 45, GA: 59 },
	{ team: "Schalke", MP: 34, MW: 10, MD: 8, GF: 52, GA: 62 },
	{ team: "Preuben Munster", MP: 34, MW: 7, MD: 11, GF: 46, GA: 68 },
	{ team: "Braunschweig", MP: 34, MW: 8, MD: 11, GF: 38, GA: 64 },
	{ team: "Ulm", MP: 34, MW: 6, MD: 12, GF: 36, GA: 48 },
	{ team: "Regensburg", MP: 34, MW: 6, MD: 7, GF: 23, GA: 73 },
	
        ],
        matches:[
          ["Schalke", "Hertha"],
    ["Darmstadt", "Bochum"],
    ["Paderborn", "Holstein Kiel"],
	["Karlsruher", "Preuben Munster"],
	["Elvesberg", "Nurnberg"],
	["Arminia", "Dusseldorf"],
	["Magdeburg", "Braunschweig"],
	["Geuther Furth", "Dynamo"],
	["Hannover", "Kaiserslautern"]
        ]
    },
]
 const tableBody = document.querySelector(`#${frenchLigueOne.tableIdOver25} tbody`);
  if (!tableBody) return;

  const isLikelyToScore = (teamName) => {
    const team = frenchLigueOne.teams.find(t => t.team === teamName);
    return team ? team.GF >= team.MP / 0.8 : false;
  };

  frenchLigueOne.matches.forEach(([home, away]) => {
    const homeTeam = frenchLigueOne.teams.find(t => t.team === home);
    const awayTeam = frenchLigueOne.teams.find(t => t.team === away);
    if (!homeTeam || !awayTeam) return;

    const homeLikely = isLikelyToScore(home);
    const awayLikely = isLikelyToScore(away);
    const btts = homeLikely && awayLikely ? "BTTS" : "No BTTS";

    const homeAvgGoals = homeTeam.GF / homeTeam.MP;
    const awayAvgGoals = awayTeam.GF / awayTeam.MP;
    const over25 = homeAvgGoals >= 2 && awayAvgGoals >= 2 ? "Likely Over 2.5" : "Unlikely";

    if (over25 === "Likely Over 2.5") {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${home}</td>
        <td>${away}</td>
        <td>${homeLikely ? "Yes" : "No"}</td>
        <td>${awayLikely ? "Yes" : "No"}</td>
        <td>${btts}</td>
        <td>${over25}</td>
      `;
      tableBody.appendChild(row);
    }
  });
});
*/

async function loadTeamCharts() {
      const response = await fetch("{% url 'team_stats_json' %}");
      const data = await response.json();
      const wrapper = document.getElementById("chartsWrapper");

      for (const [slug, stats] of Object.entries(data)) {
        // Create canvas container
        const container = document.createElement("div");
        container.className = "chart-box";
        const canvas = document.createElement("canvas");
        canvas.id = `chart-${slug}`;
        container.appendChild(canvas);
        wrapper.appendChild(container);

        // Draw chart
        new Chart(canvas, {
          type: 'bar',
          data: {
            labels: ['Won', 'Lost'],
            datasets: [{
              label: slug.replace('-', ' ').toUpperCase(),
              data: [stats.won, stats.lost],
              backgroundColor: ['green', 'red']
            }]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }
    }

    loadTeamCharts();

   

    