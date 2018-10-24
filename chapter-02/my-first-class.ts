class MyBand {
    albums: Array<string>;
    members: number;
    constructor(albums_list: Array<string>, total_members: number) {
        this.albums = albums_list;
        this.members = total_members
    }

    listAlbums(): void {
        console.log('My favorite albums: ');
        for (let i = 0; i < this.albums.length; i++) {
            console.log(this.albums[i]);
        }
    }
}

let myFavoriteAlbums = new MyBand(['Ace of Spades', 'Rock and Roll', 'March or Die'], 3);
console.log(myFavoriteAlbums.listAlbums());

class MySinger extends MyBand {
    constructor(albums_list: Array<string>, total_numbers: number) {
        super(albums_list, total_numbers);
    }

    listAlbums(): void {
        console.log('Singer best albums:');
        for (let i = 0; i < this.albums.length; i++) {
            console.log(this.albums[i]);
        }
    }
}

const singerFavoriteAlbum = new MySinger(['At Falson Prison', 'Among out the Stars', 'Heroes'], 1);
console.log(singerFavoriteAlbum.listAlbums());
