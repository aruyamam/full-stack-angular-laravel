export class MyBand {
    albums: Array<string>;
    memebers: number;
    constructor(albums_list: Array<string>, total_members: number) {
        this.albums = albums_list;
        this.memebers = total_members;
    }

    listAlbums(): void {
        console.log('My favorite albums: ');
        for (let i = 0; i < this.albums.length; i++) {
            console.log(this.albums[i]);
        }
    }
}
